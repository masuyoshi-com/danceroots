<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Forums Controller
 *
 * @property \App\Model\Table\ForumsTable $Forums
 *
 * @method \App\Model\Entity\Forum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ForumsController extends AppController
{
    public $search_keys = ['category', 'word'];

    public $categories = [
        '質問', '相談', '雑談', '議論'
    ];

    public $paginate = [
        'limit'   => 25,
        'order'   => ['Forums.created' => 'desc'],
        'contain' => ['Users']
    ];


    /**
    * 初期化メソッド
    *
    * @return void
    */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['public', 'publicView']);
    }


    /**
     * フォーラム一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->query) {

            // 検索クエリがなければfindBySearchで警告でないように空白状態を作成
            for ($i = 0; $i < count($this->search_keys); $i++) {
                if (!isset($this->request->query[$this->search_keys[$i]])) {
                    $this->request->query[$this->search_keys[$i]] = '';
                }
            }

            $query  = $this->Forums->findBySearch($this->request->query);
            $forums = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('forum_search_request', $this->request->query);

        } else {
            $query  = $this->Forums->find()->contain(['ForumComments']);
            $forums = $this->paginate($query);
        }

        // 検索項目状態があればリード
        if ($this->Session->check('forum_search_request')) {
            $this->request->data = $this->Session->read('forum_search_request');
        }

        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set(compact('forums'));
    }


    /**
     * 公開フォーラム一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function public()
    {
        $this->viewBuilder()->setLayout('public');

        if ($this->request->query) {

            // 検索クエリがなければfindBySearchで警告でないように空白状態を作成
            for ($i = 0; $i < count($this->search_keys); $i++) {
                if (!isset($this->request->query[$this->search_keys[$i]])) {
                    $this->request->query[$this->search_keys[$i]] = '';
                }
            }

            $query  = $this->Forums->findBySearch($this->request->query);
            $forums = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('forum_search_request', $this->request->query);

        } else {
            $query  = $this->Forums->find()->contain(['ForumComments']);
            $forums = $this->paginate($query);
        }

        // 検索項目状態があればリード
        if ($this->Session->check('forum_search_request')) {
            $this->request->data = $this->Session->read('forum_search_request');
        }

        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set(compact('forums'));
    }


    /**
     * マイ フォーラム
     *
     * @return \Cake\Http\Response|void
     */
    public function list()
    {
        $forums = $this->paginate($this->Forums->findByUserId($this->Auth->user('id')));
        $this->set(compact('forums'));
    }


    /**
     * フォーラムスレッド内容
     *
     * @param string|null $id フォーラムID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードが存在しない場合
     */
    public function view($id = null)
    {
        $forum = $this->Forums->get($id, [
            'contain' => ['Users', 'ForumComments']
        ]);

        // プロフィール取得
        $forum->profile = $this->Common->getUsersByClassification($forum->user->classification, $forum->user->id);

        if ($forum->youtube) {
            // YouTubeID取得
            $forum->youtube = $this->Common->getYoutubeId($forum->youtube);
        }

        // 各コメントユーザーを取得
        if ($forum->forum_comments) {
            $i = 0;
            foreach ($forum->forum_comments as $forumComments) {
                $comment_user = $this->Forums->ForumComments->Users->findById($forumComments->user_id)->first();
                // 各ユーザープロフィール取得
                $forum['forum_comments'][$i]['profile'] = $this->Common->getUsersByClassification($comment_user->classification, $comment_user->id);
                $i++;
            }
        }
        $this->set('forum', $forum);
    }


    /**
     * 公開フォーラムスレッド内容
     *
     * @param string|null $id フォーラムID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードが存在しない場合
     */
    public function publicView($id = null)
    {
        $this->viewBuilder()->setLayout('public');
        
        $forum = $this->Forums->get($id, [
            'contain' => ['Users', 'ForumComments']
        ]);

        // プロフィール取得
        $forum->profile = $this->Common->getUsersByClassification($forum->user->classification, $forum->user->id);

        if ($forum->youtube) {
            // YouTubeID取得
            $forum->youtube = $this->Common->getYoutubeId($forum->youtube);
        }

        // 各コメントユーザーを取得
        if ($forum->forum_comments) {
            $i = 0;
            foreach ($forum->forum_comments as $forumComments) {
                $comment_user = $this->Forums->ForumComments->Users->findById($forumComments->user_id)->first();
                // 各ユーザープロフィール取得
                $forum['forum_comments'][$i]['profile'] = $this->Common->getUsersByClassification($comment_user->classification, $comment_user->id);
                $i++;
            }
        }
        $this->set('forum', $forum);
    }


    /**
     * スレッド登録
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $forum = $this->Forums->newEntity();
        if ($this->request->is('post')) {

            $forum = $this->Forums->patchEntity($forum, $this->request->getData());

            if ($this->Forums->save($forum)) {
                $this->Flash->success(__('スレッド登録しました。'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('登録できません。再度確認してください。'));
        }
        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set(compact('forum'));
    }


    /**
     * スレッド編集
     *
     * @param string|null $id フォーラムID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function edit($id = null)
    {
        $this->Common->referer();

        $forum = $this->Forums->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $forum = $this->Forums->patchEntity($forum, $this->request->getData());
            if ($this->Forums->save($forum)) {
                $this->Flash->success(__('スレッド編集しました。'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('編集できません。間違いがないか確認してください。'));
        }
        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set(compact('forum'));
    }


    /**
     * スレッド削除
     *
     * @param string|null $id フォーラムID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function delete($id = null)
    {
        $this->Common->referer();
        $this->request->allowMethod(['post', 'delete']);
        $forum = $this->Forums->get($id);

        if ($this->Forums->delete($forum)) {
            $this->Flash->success(__('スレッド削除しました。'));
        } else {
            $this->Flash->error(__('削除できません。解決しない場合はフィードバックよりお問い合わせください。'));
        }

        return $this->redirect(['action' => 'list']);
    }
}
