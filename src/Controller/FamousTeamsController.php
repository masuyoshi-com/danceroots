<?php
namespace App\Controller;

use App\Controller\AppController;

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
     * View method
     *
     * @param string|null $id Famous Team id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $famousTeam = $this->FamousTeams->get($id, [
            'contain' => []
        ]);

        $this->set('famousTeam', $famousTeam);
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
     * 有名チーム登録
     *
     * @param string $id ユーザーID
     * @return \Cake\Http\Response|null
     */
    public function add($id = null)
    {
        $famousTeam = $this->FamousTeams->newEntity();

        if ($this->request->is('post')) {
            debug($this->request->getData());
            exit;
            $famousTeam = $this->FamousTeams->patchEntity($famousTeam, $this->request->getData());
            if ($this->FamousTeams->save($famousTeam)) {
                $this->Flash->success(__('The famous team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous team could not be saved. Please, try again.'));
        }
        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set('user_id', $id);
        $this->set(compact('famousTeam', 'users'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Famous Team id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $famousTeam = $this->FamousTeams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $famousTeam = $this->FamousTeams->patchEntity($famousTeam, $this->request->getData());
            if ($this->FamousTeams->save($famousTeam)) {
                $this->Flash->success(__('The famous team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous team could not be saved. Please, try again.'));
        }
        $users = $this->FamousTeams->Users->find('list', ['limit' => 200]);
        $this->set(compact('famousTeam', 'users'));
    }
}
