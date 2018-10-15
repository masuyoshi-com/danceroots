<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FamousRoots Controller
 *
 * @property \App\Model\Table\FamousRootsTable $FamousRoots
 *
 * @method \App\Model\Entity\FamousRoot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamousRootsController extends AppController
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
        $famousRoots = $this->paginate($this->FamousRoots);

        $this->set(compact('famousRoots'));
    }

    /**
     * View method
     *
     * @param string|null $id Famous Root id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $famousRoot = $this->FamousRoots->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('famousRoot', $famousRoot);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $famousRoot = $this->FamousRoots->newEntity();
        if ($this->request->is('post')) {
            $famousRoot = $this->FamousRoots->patchEntity($famousRoot, $this->request->getData());
            if ($this->FamousRoots->save($famousRoot)) {
                $this->Flash->success(__('The famous root has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous root could not be saved. Please, try again.'));
        }
        $users = $this->FamousRoots->Users->find('list', ['limit' => 200]);
        $this->set(compact('famousRoot', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Famous Root id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $famousRoot = $this->FamousRoots->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $famousRoot = $this->FamousRoots->patchEntity($famousRoot, $this->request->getData());
            if ($this->FamousRoots->save($famousRoot)) {
                $this->Flash->success(__('The famous root has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous root could not be saved. Please, try again.'));
        }
        $users = $this->FamousRoots->Users->find('list', ['limit' => 200]);
        $this->set(compact('famousRoot', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Famous Root id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $famousRoot = $this->FamousRoots->get($id);
        if ($this->FamousRoots->delete($famousRoot)) {
            $this->Flash->success(__('The famous root has been deleted.'));
        } else {
            $this->Flash->error(__('The famous root could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
