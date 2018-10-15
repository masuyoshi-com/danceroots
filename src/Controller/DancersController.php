<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;

/**
 * Dancers Controller
 *
 * @property \App\Model\Table\DancersTable $Dancers
 * @method \App\Model\Entity\Dancer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DancersController extends AppController
{
    public $search_keys = ['pref', 'genre', 'word'];

    public $paginate = [
        'limit'   => 16,
        'order'   => ['Dancers.created' => 'desc'],
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
     * ホーム - プロフィール未作成の場合はaddアクションへ
     *
     * @return redirect add 初期登録の場合のみ
     */
    public function home()
    {
        $dancer = $this->Dancers->findByUserId($this->Auth->user('id'))->contain(['Users'])->first();

        if (!$dancer) {
            $this->Flash->default(__('最初にプロフィールを作成しましょう。'));
            $this->redirect(['action' => 'add']);
        }

        $dancer['user']['classification'] = $this->Common->getCategoryName($dancer['user']['classification']);
        // メッセージ未読数取得
        $message_number = $this->Dancers->Users->Messages->findByToUserIdAndReadFlag($this->Auth->user('id'), 0)->count();

        // お知らせ最新1か月以内を3件のみ取得
        $this->loadModel('Informations');
        $informations = $this->Informations->find()->where(['Informations.created >' => new \DateTime('-1 months')])->limit(3)->all();

        $this->set(compact('dancer', 'message_number', 'informations'));
    }


    /**
     * ダンサー検索一覧
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

            $query   = $this->Dancers->findBySearch($this->request->query);
            $dancers = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('dancer_search_request', $this->request->query);

        } else {
            $collection = new Collection($this->paginate($this->Dancers)->toArray());
            $dancers    = $collection->shuffle()->toList();
        }

        // 検索項目状態があればリード
        if ($this->Session->check('dancer_search_request')) {
            $this->request->data = $this->Session->read('dancer_search_request');
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('dancers'));
    }


    /**
     * 一般公開用ダンサー検索一覧
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

            $query   = $this->Dancers->findBySearchForPublic($this->request->query);
            $dancers = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('public_dancer_search_request', $this->request->query);

        } else {
            $query      = $this->Dancers->findByPublicFlag(0);
            $collection = new Collection($this->paginate($query)->toArray());
            $dancers    = $collection->shuffle()->toList();
        }

        // 検索項目状態があればリード
        if ($this->Session->check('public_dancer_search_request')) {
            $this->request->data = $this->Session->read('public_dancer_search_request');
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('dancers'));
    }


    /**
     * プロフィール詳細
     *
     * @param string|null $usename ユーザ名
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function view($username = null)
    {
        $user = $this->Dancers->Users->findByUsername($username)->first();

        if ($user) {

            $dancer = $this->Dancers->findByUserId($user->id)->first();
            $dancer->user = $user;

            // Youtube動画IDのみを取得
            for ($i = 1; $i <= 3; $i++) {
                $dancer['youtube' . $i] = $this->Common->getYoutubeId($dancer['youtube' . $i]);
            }

            // ユーザ区分をカテゴリ名で取得
            $dancer['user']['classification'] = $this->Common->getCategoryName($dancer['user']['classification']);

            // Musicが登録されているか
            $music = $this->Dancers->Users->DanceMusics->findByUserId($user->id)->count();
            // DanceVideoが登録されているか
            $video = $this->Dancers->Users->DanceVideos->findByUserId($user->id)->count();
            // Eventが登録されているか(delete_flagを除く)
            $event = $this->Dancers->Users->Events->findByUserIdAndDeleteFlag($user->id, 0)->count();

            $this->set('dancer', $dancer);
            $this->set(compact('music', 'video', 'event'));
            // メッセージ用変数
            $this->set('to_user_id',  $dancer->user_id);
            $this->set('to_username', $dancer->user->username);
        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }

    }


    /**
     * 一般公開用プロフィール詳細
     *
     * @param string|null $usename ユーザ名
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function publicView($username = null)
    {
        $this->viewBuilder()->setLayout('public');

        $user = $this->Dancers->Users->findByUsername($username)->first();

        if ($user) {

            $dancer = $this->Dancers->findByUserIdAndPublicFlag($user->id, 0)->first();

            if ($dancer) {
                $dancer->user = $user;

                // Youtube動画IDのみを取得
                for ($i = 1; $i <= 3; $i++) {
                    $dancer['youtube' . $i] = $this->Common->getYoutubeId($dancer['youtube' . $i]);
                }

                // ユーザ区分をカテゴリ名で取得
                $dancer['user']['classification'] = $this->Common->getCategoryName($dancer['user']['classification']);

                $this->set('dancer', $dancer);
                // メッセージ用変数
                $this->set('to_user_id',  $dancer->user_id);
                $this->set('to_username', $dancer->user->username);

            } else {
                throw new NotFoundException(__('404 ページが見つかりません。'));
            }

        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }

    }


    /**
     * ダンサープロフィール登録 -初期登録は画面周りをaddに変更
     *
     * @return \Cake\Http\Response|null 登録成功の場合はviewへ
     */
    public function add()
    {
        $this->Common->referer();

        $this->viewBuilder()->setLayout('add');

        // 区分ユーザーが存在し、本登録済みか
        $user = $this->Dancers->Users->findByIdAndRegisterFlagAndClassification($this->Auth->user('id'), 1, 0)->first();

        if ($user) {

            // そのユーザーは既に一度プロフィール登録しているか
            $profile = $this->Dancers->findByUserId($user->id)->first();

            if (!$profile) {
                $dancer = $this->Dancers->newEntity();

                if ($this->request->is('post')) {

                    $dancer = $this->Dancers->patchEntity($dancer, $this->request->getData());

                    if ($this->Dancers->save($dancer)) {
                        $this->Flash->success(__('プロフィール作成しました。各メニューが使用できるようになりました。'));
                        return $this->redirect(['action' => 'view', $user->username]);
                    }

                    $this->Flash->error(__('プロフィール作成できません。解決しない場合はフィードバックより報告してください。'));
                }
                $this->set('genres',  $this->Common->valueToKey($this->genres));
                $this->set(compact('dancer'));
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
     * ダンサー編集
     *
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException - レコードが存在しない場合
     */
    public function edit()
    {
        $this->Common->referer();

        $dancer = $this->Dancers->findByUserId($this->Auth->user('id'))->contain(['Users'])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $dancer = $this->Dancers->patchEntity($dancer, $this->request->getData());
            if ($this->Dancers->save($dancer)) {
                $this->Flash->success(__('プロフィールを更新しました。'));
                return $this->redirect(['action' => 'view', $dancer->user->username]);
            }
            $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックより報告してください。'));
        }

        if ($dancer) {

            $videos = [];
            for ($i = 1; $i <= 3; $i++) {
                $videos[] = $this->Common->getYoutubeId($dancer['youtube' . $i]);
            }

            $this->set('genres', $this->Common->valueToKey($this->genres));
            $this->set(compact('dancer', 'videos'));
        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }
    }

}
