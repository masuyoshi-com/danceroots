<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DanceMusics Controller
 *
 * @property \App\Model\Table\DanceMusicsTable $DanceMusics
 *
 * @method \App\Model\Entity\DanceMusic[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DanceMusicsController extends AppController
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
        $danceMusics = $this->paginate($this->DanceMusics);

        $this->set('genres', $this->genres);
        $this->set(compact('danceMusics'));
    }

    /**
     * View method
     *
     * @param string|null $id Dance Music id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $danceMusic = $this->DanceMusics->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('danceMusic', $danceMusic);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $danceMusic = $this->DanceMusics->newEntity();
        if ($this->request->is('post')) {
            $danceMusic = $this->DanceMusics->patchEntity($danceMusic, $this->request->getData());
            if ($this->DanceMusics->save($danceMusic)) {
                $this->Flash->success(__('The dance music has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dance music could not be saved. Please, try again.'));
        }
        $users = $this->DanceMusics->Users->find('list', ['limit' => 200]);

        $this->set('genres', $this->genres);
        $this->set(compact('danceMusic', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dance Music id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        /*
        $danceMusic = $this->DanceMusics->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $danceMusic = $this->DanceMusics->patchEntity($danceMusic, $this->request->getData());
            if ($this->DanceMusics->save($danceMusic)) {
                $this->Flash->success(__('The dance music has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dance music could not be saved. Please, try again.'));
        }
        $users = $this->DanceMusics->Users->find('list', ['limit' => 200]);
        */
        $this->set('genres', $this->genres);
        $this->set(compact('danceMusic', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dance Music id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $danceMusic = $this->DanceMusics->get($id);
        if ($this->DanceMusics->delete($danceMusic)) {
            $this->Flash->success(__('The dance music has been deleted.'));
        } else {
            $this->Flash->error(__('The dance music could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
