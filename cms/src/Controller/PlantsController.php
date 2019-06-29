<?php

namespace App\Controller;

use App\Controller\AppController;

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
        $plants = $this->paginate($this->Plants->find()->where(['user_id'=> $user_id]), $settings);

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

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plant could not be saved. Please, try again.'));
        }
        $user = $this->Plants->Users->find('list', ['limit' => 200]);
        $this->set('plant', $plant);
    }

    /**
     * Edit method
     *
     * @param string|null $id Plant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug)
    {
        $plant = $this->Plants->findBySlug($slug)
            ->contain([])->firstOrFail();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $plant = $this->Plants->patchEntity($plant, $this->request->getData(), ['accessibleFields' => ['user_id' => false]]);
            if ($this->Plants->save($plant)) {
                $this->Flash->success(__('The plant has been saved.'));

                return $this->redirect(['action' => 'index']);
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
        if (in_array($action, ['add', 'index'])) {

            return true;
        }

        // All other actions require a slug.
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        // Check that the article belongs to the current user.
        $plant = $this->Plants->findBySlug($slug)->first();

        return $plant->user_id === $user['id'];

    }

    public function initialize()
    {
        parent::initialize();
        // list what is allowed for unauthenticated users
        $this->Auth->allow(['']);
    }
}
