<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TeamGroups Controller
 *
 * @property \App\Model\Table\TeamGroupsTable $TeamGroups
 *
 * @method \App\Model\Entity\TeamGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeamGroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teams', 'Users']
        ];
        $teamGroups = $this->paginate($this->TeamGroups);

        $this->set(compact('teamGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Team Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teamGroup = $this->TeamGroups->get($id, [
            'contain' => ['Teams', 'Users']
        ]);

        $this->set('teamGroup', $teamGroup);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teamGroup = $this->TeamGroups->newEntity();
        if ($this->request->is('post')) {
            $teamGroup = $this->TeamGroups->patchEntity($teamGroup, $this->request->getData());
            if ($this->TeamGroups->save($teamGroup)) {
                $this->Flash->success(__('The team group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The team group could not be saved. Please, try again.'));
        }
        $teams = $this->TeamGroups->Teams->find('list', ['limit' => 200]);
        $users = $this->TeamGroups->Users->find('list', ['limit' => 200]);
        $this->set(compact('teamGroup', 'teams', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Team Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teamGroup = $this->TeamGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teamGroup = $this->TeamGroups->patchEntity($teamGroup, $this->request->getData());
            if ($this->TeamGroups->save($teamGroup)) {
                $this->Flash->success(__('The team group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The team group could not be saved. Please, try again.'));
        }
        $teams = $this->TeamGroups->Teams->find('list', ['limit' => 200]);
        $users = $this->TeamGroups->Users->find('list', ['limit' => 200]);
        $this->set(compact('teamGroup', 'teams', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Team Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teamGroup = $this->TeamGroups->get($id);
        if ($this->TeamGroups->delete($teamGroup)) {
            $this->Flash->success(__('The team group has been deleted.'));
        } else {
            $this->Flash->error(__('The team group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
