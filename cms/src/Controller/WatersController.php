<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Waters Controller
 *
 * @property \App\Model\Table\WatersTable $Waters
 *
 * @method \App\Model\Entity\Water[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WatersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Plants']
        ];
        $user_id = $this->Auth->user('id');

        $waters = $this->paginate($this->Waters);

        $this->set(compact('waters'));
    }

    /**
     * View method
     *
     * @param string|null $id Water id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $water = $this->Waters->get($id, [
            'contain' => ['Plants']
        ]);

        $this->set('water', $water);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $water = $this->Waters->newEntity();
        if ($this->request->is('post')) {
            $water = $this->Waters->patchEntity($water, $this->request->getData());
            if ($this->Waters->save($water)) {
                $this->Flash->success(__('The water has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The water could not be saved. Please, try again.'));
        }
        $plants = $this->Waters->Plants->find('list', ['limit' => 200]);
        $this->set(compact('water', 'plants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Water id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $water = $this->Waters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $water = $this->Waters->patchEntity($water, $this->request->getData());
            if ($this->Waters->save($water)) {
                $this->Flash->success(__('The water has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The water could not be saved. Please, try again.'));
        }
        $plants = $this->Waters->Plants->find('list', ['limit' => 200]);
        $this->set(compact('water', 'plants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Water id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $water = $this->Waters->get($id);
        if ($this->Waters->delete($water)) {
            $this->Flash->success(__('The water has been deleted.'));
        } else {
            $this->Flash->error(__('The water could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        // The add actions are always allowed to logged in users.
        if (in_array($action, ['add', 'index', 'edit', 'delete', 'last'])) {

            return true;
        }

        // All other actions require an id.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the article belongs to the current user.
        $water = $this->Waters->get($id)->first();
        $plant = $this->Plants->get($water->plant_id)->first();

        return $plant->user_id === $user['id'];

    }

    public function initialize()
    {
        parent::initialize();
        // list what is allowed for unauthenticated users
        $this->Auth->allow(['']);
    }

    public function last($plant = 1)
    {
        // https://book.cakephp.org/3.0/en/orm/query-builder.html
        $water = $this->Waters->find();
        $water->where(['plant_id' => $plant]);
        $water->order(['water_date' => 'DESC']);
        $water = $water->last();
        $water = json_decode($water);
        $difference = 'N/A';
        if (is_object($water)) {
            $water = $water->water_date;

            $water = new Time($water);
            $now = Time::now();
            $difference = $now->diff($water, $absolute = false);
            $difference = $difference->format('%R%a');
            $sign = substr($difference, 0, 1);
            if ($sign == '-') {
                $difference = substr($difference, 1);
            }
            if ($sign == '+') {
                $difference = '0';
                $this->Flash->error('The date you last watered the plant is in the future.');
            }

        } else {
            $this->Flash->error('The plant with id: ' . htmlspecialchars($plant) . ' is invalid');
        }

//        $this->request->session()->write('water', $water); // for debugging
        $this->request->session()->write('difference', $difference);


    }
}
