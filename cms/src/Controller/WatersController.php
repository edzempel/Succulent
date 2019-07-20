<?php

namespace App\Controller;

use App\Controller\AppController;

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

    public function last($plant = 1){
        $water = $this->Waters->find('all');
        $water = $water->last();
        $last = 1;
        $this->request->session()->write('last_water_date', $last);
        $this->request->session()->write('water', $water);

    }
}
