<?php

namespace App\Controller;

use App\Controller\AppController;

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
    public function add()
    {
        $pot = $this->Pots->newEntity();
        if ($this->request->is('post')) {
            $pot = $this->Pots->patchEntity($pot, $this->request->getData());
            if ($this->Pots->save($pot)) {
                $this->Flash->success(__('The pot has been saved.'));

                return $this->redirect(['action' => 'index']);
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
        if ($this->Pots->delete($pot)) {
            $this->Flash->success(__('The pot has been deleted.'));
        } else {
            $this->Flash->error(__('The pot could not be deleted. Please, try again.'));
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
