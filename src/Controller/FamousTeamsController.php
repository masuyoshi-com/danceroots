<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;

/**
 * FamousTeams Controller
 *
 * @property \App\Model\Table\FamousTeamsTable $FamousTeams
 *
 * @method \App\Model\Entity\FamousTeam[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamousTeamsController extends AppController
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
     * ホーム - プロフィール未作成の場合はaddアクションへ
     *
     * @return redirect add 初期登録の場合のみ
     */
    public function home()
    {
        $famousTeam = $this->FamousTeams->findByUserId($this->Auth->user('id'))->contain(['Users'])->first();

        if (!$famousTeam) {
            $this->Flash->default(__('最初にプロフィールを作成しましょう。'));
            $this->redirect(['action' => 'add']);
        }

        $famousTeam['user']['classification'] = $this->Common->getCategoryName($famousTeam['user']['classification']);
        // メッセージ未読数取得
        $message_number = $this->FamousTeams->Users->Messages->findByToUserIdAndReadFlag($this->Auth->user('id'), 0)->count();

        // お知らせ最新1か月以内を3件のみ取得
        $this->loadModel('Informations');
        $informations = $this->Informations->find()->where(['Informations.created >' => new \DateTime('-1 months')])->limit(3)->all();

        $this->set(compact('famousTeam', 'message_number', 'informations'));
    }


    /**
     * 有名チーム一覧
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

            $query       = $this->FamousTeams->findBySearch($this->request->query);
            $famousTeams = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('public_famous_team_search', $this->request->query);

        } else {
            $collection  = new Collection($this->paginate($this->FamousTeams)->toArray());
            $famousTeams = $collection->shuffle()->toList();
        }

        // 検索項目状態があればリード
        if ($this->Session->check('public_famous_team_search')) {
            $this->request->data = $this->Session->read('public_famous_team_search');
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('famousTeams'));
    }


    /**
     * 公開用有名チーム一覧
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

            $query       = $this->FamousTeams->findBySearch($this->request->query);
            $famousTeams = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('public_famous_team_search', $this->request->query);

        } else {
            $collection  = new Collection($this->paginate($this->FamousTeams)->toArray());
            $famousTeams = $collection->shuffle()->toList();
        }

        // 検索項目状態があればリード
        if ($this->Session->check('public_famous_team_search')) {
            $this->request->data = $this->Session->read('public_famous_team_search');
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('famousTeams'));
    }


    /**
     * プロフィール詳細
     *
     * @param string|null $username ユーザー名
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function view($username = null)
    {
        $user = $this->FamousTeams->Users->findByUsername($username)->first();

        if ($user) {
            $famousTeam = $this->FamousTeams->findByUserId($user->id)->first();
            $famousTeam->user = $user;

            // Youtube動画IDのみを取得
            for ($i = 1; $i <= 3; $i++) {
                $famousTeam['youtube' . $i] = $this->Common->getYoutubeId($famousTeam['youtube' . $i]);
            }

            // TeamMember取得
            $team_members = $this->FamousTeams->Users->FamousTeamMembers
                ->findByUserId($user->id)
                ->order(['FamousTeamMembers.display_order' => 'ASC'])
                ->all();

            // Events取得 limit4
            $team_events = $this->FamousTeams->Users->FamousEvents
                ->findByUserId($user->id)
                ->order(['FamousEvents.created' => 'DESC'])
                ->limit(4)
                ->all();

            // Roots取得
            $team_roots = $this->FamousTeams->Users->FamousRoots
                ->findByUserId($user->id)
                ->order(['FamousRoots.year' => 'ASC'])
                ->toArray();
            // RootsのYouTubeIDを取得
            for ($i = 0; $i < count($team_roots); $i++) {
                if ($team_roots[$i]['youtube']) {
                    $team_roots[$i]['youtube'] = $this->Common->getYoutubeId($team_roots[$i]['youtube']);
                }
            }

            // RespectArtist取得
            $respect_artists = $this->FamousTeams->Users->FamousArtists->findByUserId($user->id)->all();

            // Musicが登録されているか
            $musics = $this->FamousTeams->Users->DanceMusics->findByUserId($user->id)->count();

            // Videoが登録されているか
            $videos = $this->FamousTeams->Users->DanceVideos->findByUserId($user->id)->count();

            // メッセージ用変数
            $this->set('to_user_id',  $famousTeam->user_id);
            $this->set('to_username', $famousTeam->user->username);
            $this->set(compact('famousTeam', 'team_members', 'team_events', 'team_roots', 'respect_artists', 'musics', 'videos'));
        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }

    }


    /**
     * ミュージック
     *
     * @param string $username ユーザー名
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function music($username = null)
    {
        $this->paginate = ['limit' => 25];

        $user = $this->FamousTeams->Users->findByUsername($username)->first();

        if ($user) {

            $famousTeam = $this->FamousTeams->findByUserId($user->id)->first();
            $famousTeam->user = $user;

            $query  = $this->FamousTeams->Users->DanceMusics->findByUserId($user->id);
            $musics = $this->paginate($query);

            $this->set(compact('famousTeam', 'musics'));
        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }
    }


    /**
     * ダンスビデオ
     *
     * @param string $username ユーザー名
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function video($username = null)
    {
        $this->paginate = ['limit' => 10];

        $user = $this->FamousTeams->Users->findByUsername($username)->first();

        if ($user) {

            $famousTeam = $this->FamousTeams->findByUserId($user->id)->first();
            $famousTeam->user = $user;

            $query  = $this->FamousTeams->Users->DanceVideos->findByUserId($user->id);
            $videos = $this->paginate($query)->toArray();

            for ($i = 0; $i < count($videos); $i++) {
                $videos[$i]['youtube'] = $this->Common->getYoutubeId($videos[$i]['youtube']);
            }

            $this->set(compact('famousTeam', 'videos'));
        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }
    }


    /**
     * 公開用有名チームビュー
     *
     * @param string|null $username ユーザー名
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function pv($username = null)
    {
        $this->viewBuilder()->setLayout('famous');
        $user = $this->FamousTeams->Users->findByUsername($username)->first();

        if ($user) {
            $famousTeam = $this->FamousTeams->findByUserId($user->id)->first();
            $famousTeam->user = $user;

            // Youtube動画IDのみを取得
            for ($i = 1; $i <= 3; $i++) {
                $famousTeam['youtube' . $i] = $this->Common->getYoutubeId($famousTeam['youtube' . $i]);
            }

            // TeamMember取得
            $team_members = $this->FamousTeams->Users->FamousTeamMembers
                ->findByUserId($user->id)
                ->order(['FamousTeamMembers.display_order' => 'ASC'])
                ->all();

            // Events取得 limit4
            $team_events = $this->FamousTeams->Users->FamousEvents
                ->findByUserId($user->id)
                ->order(['FamousEvents.created' => 'DESC'])
                ->limit(4)
                ->all();

            // Roots取得
            $team_roots = $this->FamousTeams->Users->FamousRoots
                ->findByUserId($user->id)
                ->order(['FamousRoots.year' => 'ASC'])
                ->limit(5)
                ->toArray();
                
            // RootsのYouTubeIDを取得
            for ($i = 0; $i < count($team_roots); $i++) {
                if ($team_roots[$i]['youtube']) {
                    $team_roots[$i]['youtube'] = $this->Common->getYoutubeId($team_roots[$i]['youtube']);
                }
            }

            // RespectArtist取得
            $respect_artists = $this->FamousTeams->Users->FamousArtists->findByUserId($user->id)->all();

            $this->set(compact('famousTeam', 'team_members', 'team_events', 'team_roots', 'respect_artists'));
        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }
    }


    /**
     * 公開用有名チームビュー(サンプル)
     *
     * @param string|null $id Legend Team id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function sample()
    {
        $this->viewBuilder()->setLayout('famous');

        /*
        $famousTeam = $this->FamousTeams->get($id, [
            'contain' => []
        ]);

        $this->set('famousTeam', $famousTeam);
        */
    }


    /**
     * 有名チームプロフィール登録 -初期登録は画面周りをaddに変更
     *
     * @return \Cake\Http\Response|null 登録成功の場合はviewへ
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function add()
    {
        $this->Common->referer();

        $this->viewBuilder()->setLayout('add');

        // 区分ユーザーが存在し、本登録済みか
        $user = $this->FamousTeams->Users->findByIdAndRegisterFlagAndClassification($this->Auth->user('id'), 1, 5)->first();

        if ($user) {

            // そのユーザーは既に一度プロフィール登録しているか
            $profile = $this->FamousTeams->findByUserId($user->id)->first();

            if (!$profile) {
                $famousTeam = $this->FamousTeams->newEntity();

                if ($this->request->is('post')) {

                    $famousTeam = $this->FamousTeams->patchEntity($famousTeam, $this->request->getData());

                    if ($this->FamousTeams->save($famousTeam)) {
                        $this->Flash->success(__('プロフィール作成しました。各メニューが使用できるようになりました。'));
                        return $this->redirect(['action' => 'home']);
                    }

                    $this->Flash->error(__('エラーがあります。入力項目を確認してください。'));
                }
                $this->set('genres',  $this->Common->valueToKey($this->genres));
                $this->set(compact('famousTeam'));
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
     * 有名チームプロフィール編集
     *
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードがない場合
     */
    public function edit()
    {
        $this->Common->referer();
        $famousTeam = $this->FamousTeams->findByUserId($this->Auth->user('id'))->contain(['Users'])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $famousTeam = $this->FamousTeams->patchEntity($famousTeam, $this->request->getData());
            if ($this->FamousTeams->save($famousTeam)) {

                $this->Flash->success(__('プロフィール編集しました。'));
                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error(__('エラーがあります。入力項目を確認してください。'));
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('famousTeam'));
    }
}
