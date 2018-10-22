<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FamousRoots Controller
 *
 * @property \App\Model\Table\FamousRootsTable $FamousRoots
 *
 * @method \App\Model\Entity\FamousRoot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamousRootsController extends AppController
{

    /**
     * ダンスルーツ一覧 (管理)
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // ユーザー区分で判定
        if ($this->Auth->user('classification') === 4) {
            // ダンサー名のみ取得
            $famous = $this->FamousRoots->Users->FamousDancers
                ->findByUserId($this->Auth->user('id'))
                ->select(['FamousDancers.name'])
                ->first();
        } elseif ($this->Auth->user('classification') === 5) {
            // チーム名のみ取得
            $famous = $this->FamousRoots->Users->FamousTeams
                ->findByUserId($this->Auth->user('id'))
                ->select(['FamousTeams.name'])
                ->first();
        }

        $famousRoots = $this->FamousRoots->findByUserId($this->Auth->user('id'))->toArray();

        // YouTubeIDのみを取得
        for ($i = 0; $i < count($famousRoots); $i++) {
            if ($famousRoots[$i]['youtube']) {
                $famousRoots[$i]['youtube'] = $this->Common->getYoutubeId($famousRoots[$i]['youtube']);
            }
        }

        $this->set(compact('famousRoots', 'famous'));
    }


    /**
     * View method
     *
     * @param string|null $id Famous Root id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $famousRoot = $this->FamousRoots->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('famousRoot', $famousRoot);
    }


    /**
     * ダンスルーツ登録
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $famousRoot = $this->FamousRoots->newEntity();
        if ($this->request->is('post')) {
            $famousRoot = $this->FamousRoots->patchEntity($famousRoot, $this->request->getData());
            if ($this->FamousRoots->save($famousRoot)) {

                $this->Flash->success(__('活動経歴を登録をしました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('エラーがあります。入力項目を再確認してください。'));
        }

        $this->set('years', $this->Common->getSelectYears());
        $this->set(compact('famousRoot'));
    }


    /**
     * ダンスルーツ編集
     *
     * @param string|null $id Famous Root id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードがない場合
     */
    public function edit($id = null)
    {
        $this->Common->referer();
        $famousRoot = $this->FamousRoots->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $famousRoot = $this->FamousRoots->patchEntity($famousRoot, $this->request->getData());

            if ($this->FamousRoots->save($famousRoot)) {
                $this->Flash->success(__('活動経歴を編集をしました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('エラーがあります。入力項目を再確認してください。'));
        }
        $this->set('years', $this->Common->getSelectYears());
        $this->set(compact('famousRoot'));
    }


    /**
     * ダンスルーツ削除
     *
     * @param string|null $id Famous Root id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function delete($id = null)
    {
        $this->Common->referer();
        $this->request->allowMethod(['post', 'delete']);
        $famousRoot = $this->FamousRoots->get($id);

        if ($this->FamousRoots->delete($famousRoot)) {
            $this->Flash->success(__('活動経歴を削除をしました。'));
        } else {
            $this->Flash->error(__('削除できません。解決しない場合はフィードバックよりお問い合わせください。'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
