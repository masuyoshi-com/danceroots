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
    public $search_keys = ['pref', 'genre', 'word'];

    public $paginate = [
        'limit' => 16,
        'order' => ['FamousDancers.created' => 'desc']
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
        $this->viewBuilder()->setLayout('public_fluid');
        $famousDancers = $this->paginate($this->FamousDancers);

        $this->set('genres', $this->Common->valueToKey($this->genres));
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
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function pv()
    {
        $this->viewBuilder()->setLayout('famous');

        /*
        $famousDancer = $this->FamousDancers->get($id, [
            'contain' => []
        ]);

        $this->set('famousDancer', $famousDancer);
        */
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $famousDancer = $this->FamousDancers->newEntity();
        if ($this->request->is('post')) {
            $famousDancer = $this->FamousDancers->patchEntity($famousDancer, $this->request->getData());
            if ($this->FamousDancers->save($famousDancer)) {
                $this->Flash->success(__('The famous dancer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous dancer could not be saved. Please, try again.'));
        }
        $users = $this->FamousDancers->Users->find('list', ['limit' => 200]);
        $this->set(compact('famousDancer', 'users'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Famous Dancer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $famousDancer = $this->FamousDancers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $famousDancer = $this->FamousDancers->patchEntity($famousDancer, $this->request->getData());
            if ($this->FamousDancers->save($famousDancer)) {
                $this->Flash->success(__('The famous dancer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous dancer could not be saved. Please, try again.'));
        }
        $users = $this->FamousDancers->Users->find('list', ['limit' => 200]);
        $this->set(compact('famousDancer', 'users'));
    }

}
