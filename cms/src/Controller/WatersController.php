<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Log\Log;

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
    public function index($plant_id = null)
    {
        // get common name for this plant
        $this->loadModel('Plants');
        $plant = $this->Plants->get($plant_id);
        $common_name = $plant->common_name;
        $this->request->session()->write('commmon_name', $common_name);
        $this->request->session()->write('plant_id', $plant->id);

        $this->paginate = [
            'contain' => ['Plants']
        ];
        $user_id = $this->Auth->user('id');

        $waters = $this->paginate($this->Waters->find('all')->where(['plant_id' => $plant_id])->orderDesc('water_date'));
        $last_watered = $waters->first();
        $last_watered = new Time($last_watered['water_date']);
        $now = Time::now();
        $difference = $now->diff($last_watered, $absolute = false);
        $difference = $difference->format('%R%a');
        $sign = substr($difference, 0, 1);
        if ($sign == '-') {
            $difference = substr($difference, 1);
        }
        if ($sign == '+') {
            $difference = '0';
            $this->Flash->error('The date you last watered the plant is in the future.');
        }
        $this->request->session()->write('days_since_watered', $difference);

        // descending dates are the most recent first
        $newest = $waters->first();
        $newest = new Time($newest['water_date']);
//        echo $newest.'<br />';
        $oldest = $waters->last();
        $oldest = new Time($oldest['water_date']);
//        echo $oldest.'<br />';
        $count = $waters->count();
        $count -= 1;
        if ($count == 0) {
            $count = 1;
        }
        $days_between_first_and_last_watering = $newest->diff($oldest)->days;
//        echo $days_between_first_and_last_watering;
        $average_days_between_waters = $days_between_first_and_last_watering / $count;
        $average_days_between_waters = number_format($average_days_between_waters, 0);
        $this->request->session()->write('average_days_between_waters', $average_days_between_waters);

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
    public function add($plant_id)
    {
        // get common name for this plant
        $this->loadModel('Plants');
        $plant = $this->Plants->get($plant_id);
        $common_name = $plant->common_name;
        $this->request->session()->write('commmon_name', $common_name);

        $this->request->session()->write('plant_id', $plant->id);

        $water = $this->Waters->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['water_date']['hour'] = 00;
            $data['water_date']['minute'] = 00;
            Log::write('debug',$data);

            $water = $this->Waters->patchEntity($water, $data);
            // set the user_id from the session
            $water->plant_id = $plant_id;
//            $water->water_date->hour = 0;
//            $water->water_date->minute = 0;

            if ($this->Waters->save($water)) {
                $this->Flash->success(__('The water has been saved.'));

                return $this->redirect(['controller' => 'plants', 'action' => 'view', $plant_id]);
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

        // get common name for this plant
        $this->loadModel('Plants');
        $plant = $this->Plants->get($water->plant_id);
        $common_name = $plant->common_name;
        $this->request->session()->write('commmon_name', $common_name);
//        echo $common_name;

        $this->request->session()->write('plant_id', $plant->id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['water_date']['hour'] = 00;
            $data['water_date']['minute'] = 00;
            $water = $this->Waters->patchEntity($water, $data);

            if ($this->Waters->save($water)) {

                $this->Flash->success(__('The water has been saved.'));

                return $this->redirect(['action' => 'index', $water->plant_id]);
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

        $success_date = $water->water_date;
        if ($this->Waters->delete($water)) {
            $this->Flash->success(__('The date: '.$success_date.', has been deleted form watering history.'));
        } else {
            $this->Flash->error(__('The water could not be deleted. Please, try again.'));
        }

        $plant_id = $this->request->session()->read('plant_id');
        return $this->redirect(['controller'=> 'waters', 'action' => 'index', $plant_id]);
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
