<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Legends Controller
 *
 * @property \App\Model\Table\LegendsTable $Legends
 *
 * @method \App\Model\Entity\Legend[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LegendsController extends AppController
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
     * 伝説チーム一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $legends = $this->paginate($this->Legends);

        $this->set(compact('legends'));
    }


    /**
     * 公開用伝説チーム一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function public()
    {
        $this->viewBuilder()->setLayout('public');
        $legends = $this->paginate($this->Legends);

        $this->set(compact('legends'));
    }


    /**
     * 伝説チームビュー
     *
     * @param string|null $id Legend id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $legend = $this->Legends->get($id, [
            'contain' => []
        ]);

        $this->set('legend', $legend);
    }


    /**
     * 公開用伝説チームビュー
     *
     * @param string|null $id Legend id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function publicView()
    {
        $this->viewBuilder()->setLayout('public');

        //$legend = $this->Legends->get($id);

        //$this->set('legend', $legend);
    }
}
