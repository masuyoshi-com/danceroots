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

}
