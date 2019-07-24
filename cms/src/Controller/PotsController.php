<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Pots Controller
 *
 * @property \App\Model\Table\PotsTable $Pots
 *
 * @method \App\Model\Entity\Pot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PotsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($plant_id = null)
    {
        $this->paginate = [
            'contain' => ['Plants']
        ];
        $pots = $this->paginate($this->Pots->find('all')->where(['plant_id' => $plant_id])->orderDesc('pot_Date'));
        $last_potted = $pots->first();
        $last_potted = new Time($last_potted['pot_date']);
        $now = Time::now();
        $difference = $now->diff($last_potted, $absolute = false);
        $difference = $difference->format('%R%a');
        $sign = substr($difference, 0, 1);
        if ($sign == '-') {
            $difference = substr($difference, 1);
        }
        if ($sign == '+') {
            $difference = '0';
            $this->Flash->error('The date you last potted the plant is in the future.');
        }
        $this->request->session()->write('days_since_potted', $difference);

        $this->set(compact('pots'));
    }

    /**
     * View method
     *
     * @param string|null $id Pot id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pot = $this->Pots->get($id, [
            'contain' => ['Plants']
        ]);

        $this->set('pot', $pot);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($plant_id)
    {
        // get common name for this plant
        $this->loadModel('Plants');
        $plant = $this->Plants->get($plant_id);
        $common_name = $plant->common_name;
        $this->request->session()->write('commmon_name', $common_name);
//        echo $common_name;

        $pot = $this->Pots->newEntity();
        if ($this->request->is('post')) {
            $pot = $this->Pots->patchEntity($pot, $this->request->getData());
            // set the user_id from the session
            $pot->plant_id = $plant_id;

            if ($this->Pots->save($pot)) {
                $this->Flash->success(__('The pot has been saved.'));

                return $this->redirect(['controller' => 'plants', 'action' => 'view', $plant_id]);
            }
            $this->Flash->error(__('The pot could not be saved. Please, try again.'));
        }
        $plants = $this->Pots->Plants->find('list', ['limit' => 200]);
        $this->set(compact('pot', 'plants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pot = $this->Pots->get($id, [
            'contain' => []
        ]);

        // get common name for this plant
        $this->loadModel('Plants');
        $plant = $this->Plants->get($pot->plant_id);
        $common_name = $plant->common_name;
        $this->request->session()->write('commmon_name', $common_name);
//        echo $common_name;


        if ($this->request->is(['patch', 'post', 'put'])) {
            $pot = $this->Pots->patchEntity($pot, $this->request->getData());
            if ($this->Pots->save($pot)) {
                $this->Flash->success(__('The pot has been saved.'));

                return $this->redirect(['action' => 'index', $pot->plant_id]);
            }
            $this->Flash->error(__('The pot could not be saved. Please, try again.'));
        }
        $plants = $this->Pots->Plants->find('list', ['limit' => 200]);
        $this->set(compact('pot', 'plants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pot = $this->Pots->get($id);
        $success_date = $pot->pot_date;

        if ($this->Pots->delete($pot)) {
            $this->Flash->success(__('The date: ' . $success_date . ', has been deleted from potting history.'));
        } else {
            $this->Flash->error(__('The pot could not be deleted. Please, try again.'));
        }

        $plant_id = $this->request->session()->read('plant_id');
        return $this->redirect(['controller' => 'pots', 'action' => 'index', $plant_id]);
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
        $pot = $this->Pots->get($id)->first();
        $plant = $this->Plants->get($pot->plant_id)->first();

        return $plant->user_id === $user['id'];

    }

    public function initialize()
    {
        parent::initialize();
        // list what is allowed for unauthenticated users
        $this->Auth->allow(['']);
    }
}
