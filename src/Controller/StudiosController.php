<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Studios Controller
 *
 * @property \App\Model\Table\StudiosTable $Studios
 *
 * @method \App\Model\Entity\Studio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudiosController extends AppController
{
    public $search_keys = ['pref', 'word'];

    public $paginate = [
           'limit'   => 16,
           'order'   => ['Studios.created' => 'desc'],
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
     * ホーム - 初期登録時、プロフィール未作成の場合、強制的にaddアクションへ
     *
     * @return redirect add 初期登録の場合のみ
     *
     */
    public function home()
    {
        $query = $this->Studios->findByUserId($this->Auth->user('id'))->contain(['Users']);
        $studio = $query->first();

        if (!$studio) {
            $this->Flash->default(__('最初にプロフィールを作成しましょう。'));
            $this->redirect(['action' => 'add']);
        }

        $studio['user']['classification'] = $this->Common->getCategoryName($studio['user']['classification']);
        // メッセージ未読数取得
        $message_number = $this->Studios->Users->Messages->findByToUserIdAndReadFlag($this->Auth->user('id'), 0)->count();
        // お知らせ最新1か月以内を3件のみ取得
        $this->loadModel('Informations');
        $informations = $this->Informations->find()->where(['Informations.created >' => new \DateTime('-1 months')])->limit(3)->all();

        $this->set(compact('studio', 'message_number', 'informations'));
    }


    /**
     * スタジオ検索一覧
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

            $query   = $this->Studios->findBySearch($this->request->query);
            $studios = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('studio_search_request', $this->request->query);

        } else {
            $studios = $this->paginate($this->Studios);
        }

        // 検索項目状態があればリード
        if ($this->Session->check('studio_search_request')) {
            $this->request->data = $this->Session->read('studio_search_request');
        }

        $this->set(compact('studios'));
    }


    /**
     * 一般公開スタジオ検索一覧
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

            $query   = $this->Studios->findBySearchForPublic($this->request->query);
            $studios = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('public_studio_search_request', $this->request->query);

        } else {
            $query   = $this->Studios->findByPublicFlag(0);
            $studios = $this->paginate($query);
        }

        // 検索項目状態があればリード
        if ($this->Session->check('public_studio_search_request')) {
            $this->request->data = $this->Session->read('public_studio_search_request');
        }

        $this->set(compact('studios'));
    }


    /**
     * スタジオプロフィール詳細
     *
     * @param string|null $username ユーザー名
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function view($username = null)
    {
        $user = $this->Studios->Users->findByUsername($username)->first();

        if ($user) {

            $studio = $this->Studios->findByUserId($user->id)->first();
            $studio->user = $user;

            $studio['youtube'] = $this->Common->getYoutubeId($studio['youtube']);
            // ユーザ区分をカテゴリ名で取得
            $studio['user']['classification'] = $this->Common->getCategoryName($studio['user']['classification']);
            // スタジオスケジュールが存在するか
            $this->loadModel('StudioSchedules');
            $schedule_count = $this->StudioSchedules->findByUserId($studio->user_id)->count();

            $this->set('schedule', $schedule_count);
            $this->set('studio', $studio);
            // メッセージ用変数
            $this->set('to_user_id',  $studio->user_id);
            $this->set('to_username', $studio->user->username);

        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }


    }


    /**
     * 一般公開スタジオプロフィール詳細
     *
     * @param string|null $username ユーザー名
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function publicView($username = null)
    {
        $this->viewBuilder()->setLayout('public');

        $user = $this->Studios->Users->findByUsername($username)->first();

        if ($user) {
            // 公開済みであること
            $studio = $this->Studios->findByUserIdAndPublicFlag($user->id, 0)->first();
            if ($studio) {
                $studio->user = $user;

                $studio['youtube'] = $this->Common->getYoutubeId($studio['youtube']);

                // ユーザ区分をカテゴリ名で取得
                $studio['user']['classification'] = $this->Common->getCategoryName($studio['user']['classification']);
                // スタジオスケジュールが存在するか
                $this->loadModel('StudioSchedules');
                $schedule_count = $this->StudioSchedules->findByUserId($studio->user_id)->count();

                $this->set('schedule', $schedule_count);
                $this->set('studio', $studio);
                // メッセージ用変数
                $this->set('to_user_id',  $studio->user_id);
                $this->set('to_username', $studio->user->username);
            } else {
                throw new NotFoundException(__('404 ページが見つかりません。'));
            }
        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }
    }


    /**
     * スタジオプロフィール登録
     *
     * @return \Cake\Http\Response|null 登録成功の場合はviewへ
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function add()
    {
        $this->Common->referer();

        $this->viewBuilder()->setLayout('add');

        $user = $this->Studios->Users->findByIdAndRegisterFlagAndClassification($this->Auth->user('id'), 1, 1)->first();

        if ($user) {
            // 既に区分プロフィール作成済みか
            $profile = $this->Studios->findByUserId($user->id)->first();

            // プロフィール未作成で許可
            if (!$profile) {
                $studio = $this->Studios->newEntity();

                if ($this->request->is('post')) {

                    $studio = $this->Studios->patchEntity($studio, $this->request->getData());

                    if ($this->Studios->save($studio)) {
                        $this->Flash->success(__('プロフィール作成しました。メニューが使用できるようになりました。'));
                        return $this->redirect(['action' => 'view', $studio->user_id]);
                    }

                    $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックよりお問い合わせください。'));
                }

                $this->set('genres', $this->Common->valueToKey($this->genres));
                $this->set(compact('studio'));
            } else {
                $this->Auth->logout();
                throw new NotFoundException(__('404 不正なアクセスまたはコンテンツが見つかりません。'));
            }
        } else {
            $this->Auth->logout();
            throw new NotFoundException(__('404 不正なアクセスまたはコンテンツが見つかりません。'));
        }

    }


    /**
     * スタジオ編集
     *
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException - レコードが存在しない場合
     */
    public function edit()
    {
        $this->Common->referer();

        $studio = $this->Studios->findByUserId($this->Auth->user('id'))->contain(['Users'])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $studio = $this->Studios->patchEntity($studio, $this->request->getData());

            if ($this->Studios->save($studio)) {
                $this->Flash->success(__('プロフィール更新しました。'));
                return $this->redirect(['action' => 'view', $studio->user_id]);
            }

            $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックよりお問い合わせください。'));
        }

        if ($studio) {

            $videos = '';
            $videos = $this->Common->getYoutubeId($studio['youtube']);

            $this->set('genres', $this->Common->valueToKey($this->genres));
            $this->set(compact('studio', 'videos'));

        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }
    }

}
