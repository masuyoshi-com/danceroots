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
     * コメント登録
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $this->Common->referer();
        $this->autoRender = false;

        $forumComment = $this->ForumComments->newEntity();

        if ($this->request->is('post')) {
            $forumComment = $this->ForumComments->patchEntity($forumComment, $this->request->getData());

            if ($this->ForumComments->save($forumComment)) {
                $this->Flash->success(__('コメントを書き込みしました。'));
                return $this->redirect(['controller' => 'Forums', 'action' => 'view', $forumComment->forum_id]);
            }
            $this->Flash->error(__('書き込みできません。コメント入力は必須です。'));
            return $this->redirect(['controller' => 'Forums', 'action' => 'view', $forumComment->forum_id]);
        }
        $this->set(compact('forumComment'));
    }


    /**
     * コメント削除
     *
     * @param string|null $id コメントID
     * @return \Cake\Http\Response|null リダイレクト先 Forum/view/forum_id
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function delete($id = null)
    {
        $this->Common->referer();
        $this->request->allowMethod(['post', 'delete']);
        $forumComment = $this->ForumComments->get($id);
        if ($this->ForumComments->delete($forumComment)) {
            $this->Flash->success(__('コメント削除しました。'));
        } else {
            $this->Flash->error(__('コメント削除できません。解決しない場合はフィードバックよりお問い合わせください。'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
