<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FamousEvents Controller
 *
 * @property \App\Model\Table\FamousEventsTable $FamousEvents
 *
 * @method \App\Model\Entity\FamousEvent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamousEventsController extends AppController
{

    public $paginate = [
        'limit' => 16,
        'order' => ['FamousEvents.created' => 'desc']
    ];

    /**
    * 初期化メソッド
    *
    * @return void
    */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['public']);
    }

    /**
     * 有名チーム/ダンサー イベント一覧(管理)
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $famousEvents = $this->paginate($this->FamousEvents);

        $this->set(compact('famousEvents'));
    }


    /**
     * 有名チーム/ダンサーイベント一覧
     *
     * @param string|null $id Famous Event id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $famousEvent = $this->FamousEvents->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('famousEvent', $famousEvent);
    }


    /**
     * 公開用 有名チーム/ダンサーイベント一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function public()
    {
        $this->viewBuilder()->setLayout('famous');
        /*
        $famousEvents = $this->paginate($this->FamousEvents);

        $this->set(compact('famousEvents'));
        */
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $famousEvent = $this->FamousEvents->newEntity();
        if ($this->request->is('post')) {
            $famousEvent = $this->FamousEvents->patchEntity($famousEvent, $this->request->getData());
            if ($this->FamousEvents->save($famousEvent)) {
                $this->Flash->success(__('The famous event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous event could not be saved. Please, try again.'));
        }
        $users = $this->FamousEvents->Users->find('list', ['limit' => 200]);
        $this->set(compact('famousEvent', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Famous Event id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $famousEvent = $this->FamousEvents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $famousEvent = $this->FamousEvents->patchEntity($famousEvent, $this->request->getData());
            if ($this->FamousEvents->save($famousEvent)) {
                $this->Flash->success(__('The famous event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The famous event could not be saved. Please, try again.'));
        }
        $users = $this->FamousEvents->Users->find('list', ['limit' => 200]);
        $this->set(compact('famousEvent', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Famous Event id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $famousEvent = $this->FamousEvents->get($id);
        if ($this->FamousEvents->delete($famousEvent)) {
            $this->Flash->success(__('The famous event has been deleted.'));
        } else {
            $this->Flash->error(__('The famous event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
