<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Photos Controller
 *
 * @property \App\Model\Table\PhotosTable $Photos
 *
 * @method \App\Model\Entity\Photo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhotosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */


    public function index($plant_id = null)
    {


        $this->paginate = [
            'contain' => ['Plants']
        ];

        $settings = [
            'limit' => 8,
        ];

        $photos = $this->paginate($this->Photos->find()->where(['plant_id' => $plant_id])->orderDesc('photos.created'), $settings);


        $this->set(compact('photos'));
    }


    /**
     * View method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $photo = $this->Photos->get($id, [
            'contain' => ['Plants']
        ]);

        $this->set('photo', $photo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($plant_id)
    {
        $photo = $this->Photos->newEntity();
        if ($this->request->is('post')) {
            $photo = $this->Photos->patchEntity($photo, $this->request->getData());
            $photo->plant_id = $plant_id;

            if ($this->Photos->save($photo)) {
                $this->UpdatePhotoName->updatePhotoName($photo);
                $this->Flash->success(__($photo->photo . ' has been saved.'));

                return $this->redirect(['controller' => 'Plants', 'action' => 'view', $plant_id]);
            }
            $this->Flash->error(__('The photo could not be saved. Please, try again.'));
        }
        $plants = $this->Photos->Plants->find('list', ['limit' => 200]);
        $this->set(compact('photo', 'plants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $photo = $this->Photos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->Photos->patchEntity($photo, $this->request->getData());
            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('The photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The photo could not be saved. Please, try again.'));
        }
        $plants = $this->Photos->Plants->find('list', ['limit' => 200]);
        $this->set(compact('photo', 'plants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $photo = $this->Photos->get($id);
        if ($this->Photos->delete($photo)) {
            $this->DeletePhoto->deletePhoto($photo);
            $this->Flash->success(__($photo->photo . ' has been deleted'));
        } else {
            $this->Flash->error(__($photo->photo . ' could not be deleted. Please, try again.'));
        }
        $plant_id = $this->request->session()->read('plant_id');

        return $this->redirect(['controller' => 'photos', 'action' => 'index', $plant_id]);
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
        $water = $this->Photos->get($id)->first();
        $plant = $this->Plants->get($water->plant_id)->first();

        return $plant->user_id === $user['id'];

    }

    public function initialize()
    {
        parent::initialize();
        // list what is allowed for unauthenticated users
        $this->Auth->allow(['']);

        $this->loadComponent('UpdatePhotoName');
        $this->loadComponent('DeletePhoto');
    }

}
