<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FamousTeamMembers Controller
 *
 * @property \App\Model\Table\FamousTeamMembersTable $FamousTeamMembers
 *
 * @method \App\Model\Entity\FamousTeamMember[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamousTeamMembersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'FamousTeams', 'FamousDancers']
        ];
        $famousTeamMembers = $this->paginate($this->FamousTeamMembers);

        $this->set(compact('famousTeamMembers'));
    }

    /**
     * View method
     *
     * @param string|null $id Famous Team Member id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $famousTeamMember = $this->FamousTeamMembers->get($id, [
            'contain' => ['Users', 'FamousTeams', 'FamousDancers']
        ]);

        $this->set('famousTeamMember', $famousTeamMember);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $famousTeamMember = $this->FamousTeamMembers->newEntity();
        if ($this->request->is('post')) {
            $famousTeamMember = $this->FamousTeamMembers->patchEntity($famousTeamMember, $this->request->getData());
            if ($this->FamousTeamMembers->save($famousTeamMember)) {
                $this->Flash->success(__('The famous team member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous team member could not be saved. Please, try again.'));
        }
        $users = $this->FamousTeamMembers->Users->find('list', ['limit' => 200]);
        $famousTeams = $this->FamousTeamMembers->FamousTeams->find('list', ['limit' => 200]);
        $famousDancers = $this->FamousTeamMembers->FamousDancers->find('list', ['limit' => 200]);
        $this->set(compact('famousTeamMember', 'users', 'famousTeams', 'famousDancers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Famous Team Member id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $famousTeamMember = $this->FamousTeamMembers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $famousTeamMember = $this->FamousTeamMembers->patchEntity($famousTeamMember, $this->request->getData());
            if ($this->FamousTeamMembers->save($famousTeamMember)) {
                $this->Flash->success(__('The famous team member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous team member could not be saved. Please, try again.'));
        }
        $users = $this->FamousTeamMembers->Users->find('list', ['limit' => 200]);
        $famousTeams = $this->FamousTeamMembers->FamousTeams->find('list', ['limit' => 200]);
        $famousDancers = $this->FamousTeamMembers->FamousDancers->find('list', ['limit' => 200]);
        $this->set(compact('famousTeamMember', 'users', 'famousTeams', 'famousDancers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Famous Team Member id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $famousTeamMember = $this->FamousTeamMembers->get($id);
        if ($this->FamousTeamMembers->delete($famousTeamMember)) {
            $this->Flash->success(__('The famous team member has been deleted.'));
        } else {
            $this->Flash->error(__('The famous team member could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
