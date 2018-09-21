<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ForumComments Controller
 *
 * @property \App\Model\Table\ForumCommentsTable $ForumComments
 *
 * @method \App\Model\Entity\ForumComment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ForumCommentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Forums']
        ];
        $forumComments = $this->paginate($this->ForumComments);

        $this->set(compact('forumComments'));
    }

    /**
     * View method
     *
     * @param string|null $id Forum Comment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $forumComment = $this->ForumComments->get($id, [
            'contain' => ['Users', 'Forums']
        ]);

        $this->set('forumComment', $forumComment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $forumComment = $this->ForumComments->newEntity();
        if ($this->request->is('post')) {
            $forumComment = $this->ForumComments->patchEntity($forumComment, $this->request->getData());
            if ($this->ForumComments->save($forumComment)) {
                $this->Flash->success(__('The forum comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forum comment could not be saved. Please, try again.'));
        }
        $users = $this->ForumComments->Users->find('list', ['limit' => 200]);
        $forums = $this->ForumComments->Forums->find('list', ['limit' => 200]);
        $this->set(compact('forumComment', 'users', 'forums'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Forum Comment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $forumComment = $this->ForumComments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forumComment = $this->ForumComments->patchEntity($forumComment, $this->request->getData());
            if ($this->ForumComments->save($forumComment)) {
                $this->Flash->success(__('The forum comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forum comment could not be saved. Please, try again.'));
        }
        $users = $this->ForumComments->Users->find('list', ['limit' => 200]);
        $forums = $this->ForumComments->Forums->find('list', ['limit' => 200]);
        $this->set(compact('forumComment', 'users', 'forums'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Forum Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $forumComment = $this->ForumComments->get($id);
        if ($this->ForumComments->delete($forumComment)) {
            $this->Flash->success(__('The forum comment has been deleted.'));
        } else {
            $this->Flash->error(__('The forum comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
