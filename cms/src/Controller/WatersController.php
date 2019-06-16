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
}
