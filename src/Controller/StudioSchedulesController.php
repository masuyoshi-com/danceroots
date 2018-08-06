<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StudioSchedules Controller
 *
 * @property \App\Model\Table\StudioSchedulesTable $StudioSchedules
 *
 * @method \App\Model\Entity\StudioSchedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudioSchedulesController extends AppController
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
        $studioSchedules = $this->paginate($this->StudioSchedules);

        $this->set(compact('studioSchedules'));
    }

    /**
     * View method
     *
     * @param string|null $id Studio Schedule id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studioSchedule = $this->StudioSchedules->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('studioSchedule', $studioSchedule);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studioSchedule = $this->StudioSchedules->newEntity();
        if ($this->request->is('post')) {
            $studioSchedule = $this->StudioSchedules->patchEntity($studioSchedule, $this->request->getData());
            if ($this->StudioSchedules->save($studioSchedule)) {
                $this->Flash->success(__('The studio schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The studio schedule could not be saved. Please, try again.'));
        }
        $users = $this->StudioSchedules->Users->find('list', ['limit' => 200]);
        $this->set(compact('studioSchedule', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Studio Schedule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studioSchedule = $this->StudioSchedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studioSchedule = $this->StudioSchedules->patchEntity($studioSchedule, $this->request->getData());
            if ($this->StudioSchedules->save($studioSchedule)) {
                $this->Flash->success(__('The studio schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The studio schedule could not be saved. Please, try again.'));
        }
        $users = $this->StudioSchedules->Users->find('list', ['limit' => 200]);
        $this->set(compact('studioSchedule', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Studio Schedule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studioSchedule = $this->StudioSchedules->get($id);
        if ($this->StudioSchedules->delete($studioSchedule)) {
            $this->Flash->success(__('The studio schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The studio schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
