<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;

/**
 * FamousDancers Controller
 *
 * @property \App\Model\Table\FamousDancersTable $FamousDancers
 *
 * @method \App\Model\Entity\FamousDancer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamousDancersController extends AppController
{
    public $search_keys = ['pref', 'genre', 'word'];
    public $paginate = ['limit' => 20, 'contain' => ['Users']];


    /**
    * 初期化メソッド
    *
    * @return void
    */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['public', 'pv', 'sample']);
    }


    /**
     * ホーム - 初期登録時、プロフィール未作成の場合、強制的にaddアクションへ
     *
     * @return redirect add 初期登録の場合のみ
     */
    public function home()
    {
        $famousDancer = $this->FamousDancers->findByUserId($this->Auth->user('id'))->contain(['Users'])->first();

        if (!$famousDancer) {
            $this->Flash->default(__('最初にプロフィールを作成しましょう。'));
            $this->redirect(['action' => 'add']);
        }

        $famousDancer['user']['classification'] = $this->Common->getCategoryName($famousDancer['user']['classification']);
        // メッセージ未読数取得
        $message_number = $this->FamousDancers->Users->Messages->findByToUserIdAndReadFlag($this->Auth->user('id'), 0)->count();

        // お知らせ最新1か月以内を3件のみ取得
        $this->loadModel('Informations');
        $informations = $this->Informations->find()->where(['Informations.created >' => new \DateTime('-1 months')])->limit(3)->all();

        $this->set(compact('famousDancer', 'message_number', 'informations'));
    }


    /**
     * 有名ダンサー一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $famousDancers = $this->paginate($this->FamousDancers);

        if ($this->request->query) {

            // 検索クエリがなければfindBySearchで警告でないように空白状態を作成
            for ($i = 0; $i < count($this->search_keys); $i++) {
                if (!isset($this->request->query[$this->search_keys[$i]])) {
                    $this->request->query[$this->search_keys[$i]] = '';
                }
            }

            $query = $this->FamousDancers->findBySearch($this->request->query);
            $famousDancers = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('public_famous_dancer_search', $this->request->query);

        } else {
            $collection  = new Collection($this->paginate($this->FamousDancers)->toArray());
            $famousDancers = $collection->shuffle()->toList();
        }

        // 検索項目状態があればリード
        if ($this->Session->check('public_famous_dancer_search')) {
            $this->request->data = $this->Session->read('public_famous_dancer_search');
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('famousDancers'));
    }


    /**
     * 公開用有名ダンサー一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function public()
    {
        $this->viewBuilder()->setLayout('public_fluid');

        if ($this->request->query) {

            // 検索クエリがなければfindBySearchで警告でないように空白状態を作成
            for ($i = 0; $i < count($this->search_keys); $i++) {
                if (!isset($this->request->query[$this->search_keys[$i]])) {
                    $this->request->query[$this->search_keys[$i]] = '';
                }
            }

            $query = $this->FamousDancers->findBySearch($this->request->query);
            $famousDancers = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('public_famous_dancer_search', $this->request->query);

        } else {
            $collection  = new Collection($this->paginate($this->FamousDancers)->toArray());
            $famousDancers = $collection->shuffle()->toList();
        }

        // 検索項目状態があればリード
        if ($this->Session->check('public_famous_dancer_search')) {
            $this->request->data = $this->Session->read('public_famous_dancer_search');
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('famousDancers'));
    }


    /**
     * 有名ダンサープロフィール詳細
     *
     * @param string|null $username ユーザー名
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException レコードがない場合
     */
    public function view($username = null)
    {
        $user = $this->FamousDancers->Users->findByUsername($username)->first();

        if ($user) {
            $famousDancer = $this->FamousDancers->findByUserId($user->id)->first();
            $famousDancer->user = $user;

            // Youtube動画IDのみを取得
            for ($i = 1; $i <= 3; $i++) {
                $famousDancer['youtube' . $i] = $this->Common->getYoutubeId($famousDancer['youtube' . $i]);
            }

            // チーム名があればリンクセット
            $team = $this->FamousDancers->Users->FamousTeams->findByName($famousDancer->team_name)->first();

            if ($team) {
                $team_user = $this->FamousDancers->Users->findById($team->user_id)->first();
                $this->set(compact('team_user'));
            }

            // Events取得 limit4
            $events = $this->FamousDancers->Users->FamousEvents
                ->findByUserId($user->id)
                ->order(['FamousEvents.created' => 'DESC'])
                ->limit(4)
                ->all();

            // Roots取得
            $roots = $this->FamousDancers->Users->FamousRoots
                ->findByUserId($user->id)
                ->order(['FamousRoots.year' => 'ASC'])
                ->toArray();
            // RootsのYouTubeIDを取得
            for ($i = 0; $i < count($roots); $i++) {
                if ($roots[$i]['youtube']) {
                    $roots[$i]['youtube'] = $this->Common->getYoutubeId($roots[$i]['youtube']);
                }
            }

            // RespectArtist取得
            $respect_artists = $this->FamousDancers->Users->FamousArtists->findByUserId($user->id)->all();

            // ミュージック登録があるか
            // 動画登録があるか


            // メッセージ用変数
            $this->set('to_user_id',  $famousDancer->user_id);
            $this->set('to_username', $famousDancer->user->username);
            $this->set(compact('famousDancer', 'events', 'roots', 'respect_artists'));
        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }
    }


    /**
     * 公開用有名ダンサープロフィール詳細
     *
     * @param string|null $username ユーザー名
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function pv($username = null)
    {
        $this->viewBuilder()->setLayout('famous');

        $user = $this->FamousDancers->Users->findByUsername($username)->first();

        if ($user) {
            $famousDancer = $this->FamousDancers->findByUserId($user->id)->first();
            $famousDancer->user = $user;

            // Youtube動画IDのみを取得
            for ($i = 1; $i <= 3; $i++) {
                $famousDancer['youtube' . $i] = $this->Common->getYoutubeId($famousDancer['youtube' . $i]);
            }

            // チーム名があればリンクセット
            $team = $this->FamousDancers->Users->FamousTeams->findByName($famousDancer->team_name)->first();

            if ($team) {
                $team_user = $this->FamousDancers->Users->findById($team->user_id)->first();
                $this->set(compact('team_user'));
            }

            // Events取得 limit4
            $events = $this->FamousDancers->Users->FamousEvents
                ->findByUserId($user->id)
                ->order(['FamousEvents.created' => 'DESC'])
                ->limit(4)
                ->all();

            // Roots取得
            $roots = $this->FamousDancers->Users->FamousRoots
                ->findByUserId($user->id)
                ->order(['FamousRoots.year' => 'ASC'])
                ->toArray();
            // RootsのYouTubeIDを取得
            for ($i = 0; $i < count($roots); $i++) {
                if ($roots[$i]['youtube']) {
                    $roots[$i]['youtube'] = $this->Common->getYoutubeId($roots[$i]['youtube']);
                }
            }

            // RespectArtist取得
            $respect_artists = $this->FamousDancers->Users->FamousArtists->findByUserId($user->id)->all();

            $this->set(compact('famousDancer', 'events', 'roots', 'respect_artists'));

        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }
    }


    /**
     * 公開用有名ダンサービュー(サンプル)
     *
     * @param string|null $id
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function sample()
    {
        $this->viewBuilder()->setLayout('famous');
    }


    /**
     * 有名ダンサー登録
     *
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function add()
    {
        $this->Common->referer();

        $this->viewBuilder()->setLayout('add');

        // 区分ユーザーが存在し、本登録済みか
        $user = $this->FamousDancers->Users->findByIdAndRegisterFlagAndClassification($this->Auth->user('id'), 1, 4)->first();

        if ($user) {

            // そのユーザーは既に一度プロフィール登録しているか
            $profile = $this->FamousDancers->findByUserId($user->id)->first();

            if (!$profile) {
                $famousDancer = $this->FamousDancers->newEntity();

                if ($this->request->is('post')) {

                    $famousDancer = $this->FamousDancers->patchEntity($famousDancer, $this->request->getData());

                    if ($this->FamousDancers->save($famousDancer)) {
                        $this->Flash->success(__('プロフィール作成しました。各メニューが使用できるようになりました。'));
                        return $this->redirect(['action' => 'home']);
                    }

                    $this->Flash->error(__('エラーがあります。入力項目を確認してください。'));
                }
                $this->set('genres',  $this->Common->valueToKey($this->genres));
                $this->set(compact('famousDancer'));

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
     * 有名ダンサープロフィール編集
     *
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードがない場合
     */
    public function edit()
    {
        $this->Common->referer();
        $famousDancer = $this->FamousDancers->findByUserId($this->Auth->user('id'))->contain(['Users'])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $famousDancer = $this->FamousDancers->patchEntity($famousDancer, $this->request->getData());
            if ($this->FamousDancers->save($famousDancer)) {

                $this->Flash->success(__('プロフィール編集しました。'));
                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error(__('エラーがあります。入力項目を確認してください。'));
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('famousDancer'));
    }

}
