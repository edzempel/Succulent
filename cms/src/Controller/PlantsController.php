<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Plants Controller
 *
 * @property \App\Model\Table\PlantsTable $Plants
 *
 * @method \App\Model\Entity\Plant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $settings = [
            'limit' => 8,
            'maxLimit' => 100
        ];
        $user_id = $this->Auth->user('id');
        $plants = $this->paginate($this->Plants->find()->where(['user_id' => $user_id]), $settings);

        $this->set(compact('plants'));
    }

    /**
     * View method
     *
     * @param string|null $id Plant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plant = $this->Plants->get($id, [
            'contain' => ['Users', 'Photos', 'Pots', 'Waters']
        ]);

        $this->loadModel('Waters');
        $water = $this->Waters->find();
        $water->where(['plant_id' => $id]);
        $water->order(['water_date' => 'DESC']);
        $water = $water->first();
        $water = json_decode($water);
        if (is_object($water)) {
            $lastWatered = $water->water_date;
            $lastWatered = new Time($lastWatered);
            $lastWatered = $lastWatered->format('D, j M Y');

        } else {
            $lastWatered = 'not watered yet';
        }

        $this->loadModel('Pots');
        $pot = $this->Pots->find();
        $pot->where(['plant_id' => $id]);
        $pot->order(['pot_date' => 'DESC']);
        $pot = $pot->first();
        $pot = json_decode($pot);
        if (is_object($pot)) {
            $lastPotted = $pot->pot_date;
            $lastPotted = new Time($lastPotted);
            $lastPotted = $lastPotted->format('D, j M Y');

        } else {
            $lastPotted = 'not potted yet';
        }

        $this->request->session()->write('last_watered', $lastWatered);
        $this->request->session()->write('last_potted', $lastPotted);
        $this->set('plant', $plant);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $plant = $this->Plants->newEntity();
        if ($this->request->is('post')) {
            $plant = $this->Plants->patchEntity($plant, $this->request->getData());
            // set the user_id from the session
            $plant->user_id = $this->Auth->user('id');

            if ($this->Plants->save($plant)) {
                $this->Flash->success(__('The plant has been saved.'));
                // build this query filter into the url to see most recent plant added
                // ?sort=created&direction=desc
                return $this->redirect(['action' => 'index', '?' => ['sort' => 'created', 'direction' => 'desc']]);
            }
            $this->Flash->error(__('The plant could not be saved. Please, try again.'));
        }
//        $user = $this->Plants->Users->find('list', ['limit' => 200]); // not used
        $this->set('plant', $plant);
    }

    /**
     * Edit method
     *
     * @param string|null $id Plant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $plant = $this->Plants->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $plant = $this->Plants->patchEntity($plant, $this->request->getData(), ['accessibleFields' => ['user_id' => false]]);
            if ($this->Plants->save($plant)) {
                $this->Flash->success(__('The plant has been saved.'));

                return $this->redirect(['controller' => 'plants', 'action' => 'view', $plant->id]);
            }
            $this->Flash->error(__('The plant could not be saved. Please, try again.'));
        }
        $users = $this->Plants->Users->find('list', ['limit' => 200]);
        $this->set(compact('plant', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plant = $this->Plants->get($id);
        if ($this->Plants->delete($plant)) {
            $this->Flash->success(__('The plant has been deleted.'));
        } else {
            $this->Flash->error(__('The plant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        // The add actions are always allowed to logged in users.
        if (in_array($action, ['add', 'index', 'edit', 'delete'])) {

            return true;
        }

        // All other actions require an id.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the article belongs to the current user.
        $plant = $this->Plants->get($id)->first();

        return $plant->user_id === $user['id'];

    }

    public function initialize()
    {
        parent::initialize();
        // list what is allowed for unauthenticated users
        $this->Auth->allow(['']);
    }
}
