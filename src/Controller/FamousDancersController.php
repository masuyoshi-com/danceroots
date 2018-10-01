<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FamousDancers Controller
 *
 * @property \App\Model\Table\FamousDancersTable $FamousDancers
 *
 * @method \App\Model\Entity\FamousDancer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamousDancersController extends AppController
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
        $famousDancers = $this->paginate($this->FamousDancers);

        $this->set(compact('famousDancers'));
    }


    /**
     * 公開用有名ダンサー一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function public()
    {
        $this->viewBuilder()->setLayout('public');
        $famousDancers = $this->paginate($this->FamousDancers);

        $this->set(compact('famousDancers'));
    }


    /**
     * View method
     *
     * @param string|null $id Famous Dancer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $famousDancer = $this->FamousDancers->get($id, [
            'contain' => []
        ]);

        $this->set('famousDancer', $famousDancer);
    }


    /**
     * 公開用有名ダンサービュー
     *
     * @param string|null $id
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function publicView()
    {
        $this->viewBuilder()->setLayout('public');

        /*
        $famousDancer = $this->FamousDancers->get($id, [
            'contain' => []
        ]);

        $this->set('famousDancer', $famousDancer);
        */
    }
}
