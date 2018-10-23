<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * FamousEvents Controller
 *
 * @property \App\Model\Table\FamousEventsTable $FamousEvents
 *
 * @method \App\Model\Entity\FamousEvent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamousEventsController extends AppController
{
    public $categories = ['クラブショー', 'コンテスト', 'ワークショップ', 'その他'];

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
        // ユーザー区分で判定
        if ($this->Auth->user('classification') === 4) {
            // ダンサー名のみ取得
            $famous = $this->FamousEvents->Users->FamousDancers
                ->findByUserId($this->Auth->user('id'))
                ->select(['FamousDancers.name'])
                ->first();
        } elseif ($this->Auth->user('classification') === 5) {
            // チーム名のみ取得
            $famous = $this->FamousEvents->Users->FamousTeams
                ->findByUserId($this->Auth->user('id'))
                ->select(['FamousTeams.name'])
                ->first();
        }

        $famousEvents = $this->paginate($this->FamousEvents);
        $this->set(compact('famousEvents', 'famous'));
    }


    /**
     * 有名チーム/ダンサー イベント一覧
     *
     * @param string|null $username ユーザー名
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function view($username = null)
    {
        // ユーザー名検索
        $user = $this->FamousEvents->Users->findByUsername($username)->first();

        if ($user) {
            // ユーザー区分で判定
            if ($user->classification === 4) {
                $famous = $this->FamousEvents->Users->FamousDancers->findByUserId($user->id)->first();
            } elseif ($user->classification === 5) {
                $famous = $this->FamousEvents->Users->FamousTeams->findByUserId($user->id)->first();
            }

            $famousEvents = $this->paginate($this->FamousEvents);
            $this->set(compact('famousEvents', 'famous', 'user'));

        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }
    }


    /**
     * 公開用 有名チーム/ダンサー イベント一覧
     *
     * @param string|null $username ユーザー名
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function public($username = null)
    {
        $this->viewBuilder()->setLayout('famous');

        // ユーザー名検索
        $user = $this->FamousEvents->Users->findByUsername($username)->first();

        if ($user) {
            // ユーザー区分で判定
            if ($user->classification === 4) {
                $famous = $this->FamousEvents->Users->FamousDancers->findByUserId($user->id)->first();
            } elseif ($user->classification === 5) {
                $famous = $this->FamousEvents->Users->FamousTeams->findByUserId($user->id)->first();
            }

            $famousEvents = $this->paginate($this->FamousEvents);
            $this->set(compact('famousEvents', 'famous', 'user'));

        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }
    }


    /**
     * プロフィール内イベント登録
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $famousEvent = $this->FamousEvents->newEntity();

        if ($this->request->is('post')) {

            $famousEvent = $this->FamousEvents->patchEntity($famousEvent, $this->request->getData());

            if ($this->FamousEvents->save($famousEvent)) {
                $this->Flash->success(__('プロフィール内のイベントを登録しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('エラーがあります。入力項目を再確認してください。'));
        }

        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set(compact('famousEvent'));
    }


    /**
     * プロフィール内イベント編集
     *
     * @param string|null $id Famous Event id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードがない場合
     */
    public function edit($id = null)
    {
        $this->Common->referer();

        $famousEvent = $this->FamousEvents->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $famousEvent = $this->FamousEvents->patchEntity($famousEvent, $this->request->getData());
            if ($this->FamousEvents->save($famousEvent)) {
                $this->Flash->success(__('イベントを編集しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('エラーがあります。入力項目を再確認してください。'));
        }

        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set(compact('famousEvent'));
    }


    /**
     * プロフィール内イベント削除
     *
     * @param string|null $id Famous Event id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function delete($id = null)
    {
        $this->Common->referer();
        $this->request->allowMethod(['post', 'delete']);
        $famousEvent = $this->FamousEvents->get($id);

        // 画像も同時に削除する
        if (!is_null($famousEvent->image)) {
            // delete_img1にファイルパス代入
            $this->request->data['delete_img1'] = $famousEvent->image;
            // イメージ削除
            $this->ImageFile->isSelectedDelete($this->request->data, 'famous_event', 1);
        }

        if ($this->FamousEvents->delete($famousEvent)) {
            $this->Flash->success(__('イベントを削除しました。'));
        } else {
            $this->Flash->error(__('削除できません。解決しない場合はフィードバックよりお問い合わせください。'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
