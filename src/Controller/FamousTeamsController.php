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

    public $paginate = [
        'limit' => 16,
        'order' => ['Legends.created' => 'desc']
    ];


     /**
      * 初期化メソッド
      *
      * @return void
      */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['public', 'pv']);
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
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $famousTeams = $this->paginate($this->FamousTeams);

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
        $famousTeams = $this->paginate($this->FamousTeams);

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

            // Events取得 limit3
            $team_events = $this->FamousTeams->Users->FamousEvents
                ->findByUserId($user->id)
                ->order(['FamousEvents.created' => 'DESC'])
                ->limit(3)
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

            // メッセージ用変数
            $this->set('to_user_id',  $famousTeam->user_id);
            $this->set('to_username', $famousTeam->user->username);
            $this->set(compact('famousTeam', 'team_members', 'team_events', 'team_roots', 'respect_artists'));
        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }

    }


    /**
     * 公開用有名チームビュー
     *
     * @param string|null $id Legend Team id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function pv()
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
