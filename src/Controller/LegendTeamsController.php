<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LegendTeams Controller
 *
 * @property \App\Model\Table\LegendTeamsTable $LegendTeams
 *
 * @method \App\Model\Entity\LegendTeam[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LegendTeamsController extends AppController
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
        $legendTeams = $this->paginate($this->LegendTeams);

        $this->set(compact('legendTeams'));
    }

    /**
     * 公開用レジェンドチーム一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function public()
    {
        $this->viewBuilder()->setLayout('public');
        $legendTeams = $this->paginate($this->LegendTeams);

        $this->set(compact('legendTeams'));
    }


    /**
     * View method
     *
     * @param string|null $id Legend Team id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $legendTeam = $this->LegendTeams->get($id, [
            'contain' => []
        ]);

        $this->set('legendTeam', $legendTeam);
    }


    /**
     * 公開用レジェンドチームビュー
     *
     * @param string|null $id Legend Team id.
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
        $legendTeam = $this->LegendTeams->newEntity();
        if ($this->request->is('post')) {
            $legendTeam = $this->LegendTeams->patchEntity($legendTeam, $this->request->getData());
            if ($this->LegendTeams->save($legendTeam)) {
                $this->Flash->success(__('The legend team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The legend team could not be saved. Please, try again.'));
        }
        $this->set(compact('legendTeam'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Legend Team id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $legendTeam = $this->LegendTeams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $legendTeam = $this->LegendTeams->patchEntity($legendTeam, $this->request->getData());
            if ($this->LegendTeams->save($legendTeam)) {
                $this->Flash->success(__('The legend team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The legend team could not be saved. Please, try again.'));
        }
        $this->set(compact('legendTeam'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Legend Team id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $legendTeam = $this->LegendTeams->get($id);
        if ($this->LegendTeams->delete($legendTeam)) {
            $this->Flash->success(__('The legend team has been deleted.'));
        } else {
            $this->Flash->error(__('The legend team could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
