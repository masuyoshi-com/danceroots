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
        $this->Auth->allow(['public', 'publicView']);
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
        $this->viewBuilder()->setLayout('public');
        $famousTeams = $this->paginate($this->FamousTeams);

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
    public function publicView()
    {
        $this->viewBuilder()->setLayout('public');

        /*
        $famousTeam = $this->FamousTeams->get($id, [
            'contain' => []
        ]);

        $this->set('famousTeam', $famousTeam);
        */
    }

}
