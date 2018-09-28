<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LegendDancers Controller
 *
 * @property \App\Model\Table\LegendDancersTable $LegendDancers
 *
 * @method \App\Model\Entity\LegendDancer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LegendDancersController extends AppController
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
        $legendDancers = $this->paginate($this->LegendDancers);

        $this->set(compact('legendDancers'));
    }

    /**
     * 公開用レジェンドダンサー一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function public()
    {
        $this->viewBuilder()->setLayout('public');
        $legendDancers = $this->paginate($this->LegendDancers);

        $this->set(compact('legendDancers'));
    }


    /**
     * View method
     *
     * @param string|null $id Legend Dancer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $legendDancer = $this->LegendDancers->get($id, [
            'contain' => []
        ]);

        $this->set('legendDancer', $legendDancer);
    }


    /**
     * 公開用レジェンドダンサービュー
     *
     * @param string|null $id
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function publicView()
    {
        $this->viewBuilder()->setLayout('public');

        //$legendTeam = $this->LegendTeams->get($id);

        //$this->set('legendTeam', $legendTeam);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $legendDancer = $this->LegendDancers->newEntity();
        if ($this->request->is('post')) {
            $legendDancer = $this->LegendDancers->patchEntity($legendDancer, $this->request->getData());
            if ($this->LegendDancers->save($legendDancer)) {
                $this->Flash->success(__('The legend dancer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The legend dancer could not be saved. Please, try again.'));
        }
        $this->set(compact('legendDancer'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Legend Dancer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $legendDancer = $this->LegendDancers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $legendDancer = $this->LegendDancers->patchEntity($legendDancer, $this->request->getData());
            if ($this->LegendDancers->save($legendDancer)) {
                $this->Flash->success(__('The legend dancer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The legend dancer could not be saved. Please, try again.'));
        }
        $this->set(compact('legendDancer'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Legend Dancer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $legendDancer = $this->LegendDancers->get($id);
        if ($this->LegendDancers->delete($legendDancer)) {
            $this->Flash->success(__('The legend dancer has been deleted.'));
        } else {
            $this->Flash->error(__('The legend dancer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
