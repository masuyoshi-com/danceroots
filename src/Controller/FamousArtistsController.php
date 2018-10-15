<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FamousArtists Controller
 *
 * @property \App\Model\Table\FamousArtistsTable $FamousArtists
 *
 * @method \App\Model\Entity\FamousArtist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamousArtistsController extends AppController
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
        $famousArtists = $this->paginate($this->FamousArtists);

        $this->set(compact('famousArtists'));
    }

    /**
     * View method
     *
     * @param string|null $id Famous Artist id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $famousArtist = $this->FamousArtists->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('famousArtist', $famousArtist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $famousArtist = $this->FamousArtists->newEntity();
        if ($this->request->is('post')) {
            $famousArtist = $this->FamousArtists->patchEntity($famousArtist, $this->request->getData());
            if ($this->FamousArtists->save($famousArtist)) {
                $this->Flash->success(__('The famous artist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous artist could not be saved. Please, try again.'));
        }
        $users = $this->FamousArtists->Users->find('list', ['limit' => 200]);
        $this->set(compact('famousArtist', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Famous Artist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $famousArtist = $this->FamousArtists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $famousArtist = $this->FamousArtists->patchEntity($famousArtist, $this->request->getData());
            if ($this->FamousArtists->save($famousArtist)) {
                $this->Flash->success(__('The famous artist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous artist could not be saved. Please, try again.'));
        }
        $users = $this->FamousArtists->Users->find('list', ['limit' => 200]);
        $this->set(compact('famousArtist', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Famous Artist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $famousArtist = $this->FamousArtists->get($id);
        if ($this->FamousArtists->delete($famousArtist)) {
            $this->Flash->success(__('The famous artist has been deleted.'));
        } else {
            $this->Flash->error(__('The famous artist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
