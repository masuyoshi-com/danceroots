<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 *
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController
{
    // イベントカテゴリ
    public $categories = ['クラブイベント', 'コンテスト', 'ライブ', '発表会', 'その他'];
    public $search_keys = ['pref', 'category', 'word'];

    public $paginate = [
        'limit'   => 20,
        'order'   => ['Events.created' => 'desc'],
        'contain' => ['Users']
    ];


    /**
     * 各アクション前に発動
     *
     * @param object Event $event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Security->config('unlockedActions', ['delete']);

        // 特定のアクションのみCSRF無効化
        if (in_array($this->request->action, ['delete'])) {
            $this->eventManager()->off($this->Csrf);
        }
    }


    /**
     * マイリスト - 登録済みイベント一覧
     *
     * @param string|null $id ユーザーID
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function list($id = null)
    {
        if ((int)$id === $this->Auth->user('id')) {
            $events = $this->paginate($this->Events->findByUserIdAndDeleteFlag($id, 0));
            $this->set(compact('events'));
            $this->set('id', $id);
        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }
    }


    /**
     * イベント検索一覧
     *
     * @return \Cake\Http\Response|void
     * @todo 現在日時より過去のイベントは呼び出さない
     */
    public function index()
    {
        if ($this->request->query) {

            // 検索クエリがなければfindBySearchで警告でないように空白状態を作成
            for ($i = 0; $i < count($this->search_keys); $i++) {
                if (!isset($this->request->query[$this->search_keys[$i]])) {
                    $this->request->query[$this->search_keys[$i]] = '';
                }
            }

            $query = $this->Events->findBySearch($this->request->query);
            $events = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('event_search_request', $this->request->query);

        } else {
            $query = $this->Events->findByDeleteFlag(0);
            $events = $this->paginate($query);
        }

        // 検索項目状態があればリード
        if ($this->Session->check('event_search_request')) {
            $this->request->data = $this->Session->read('event_search_request');
        }

        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set(compact('events'));

    }


    /**
     * イベント詳細
     *
     * @param string|null $id イベントID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, ['contain' => ['Users']]);

        if ($event) {
            $event['youtube'] = $this->Common->getYoutubeId($event['youtube']);
            // オーナー検索
            $event['owner'] = $this->Common->getUsersByClassification($event['user']['classification'], $event->user_id);
            // 区分リンク取得
            $profile_links = $this->Common->linkSwitch($event['user']['classification'], 'view', $event->user_id);
            // 区分カテゴリ名取得
            $event['user']['classification'] = $this->Common->getCategoryName($event['user']['classification']);

            $this->set(compact('profile_links'));
            $this->set('event', $event);
        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }

    }


    /**
     * イベント登録
     *
     * @return redirect view イベントID付与
     */
    public function add()
    {
        $event = $this->Events->newEntity();

        if ($this->request->is('post')) {

            $event = $this->Events->patchEntity($event, $this->request->getData());

            if ($this->Events->save($event)) {

                $this->Flash->success(__('イベント登録しました。'));
                return $this->redirect(['action' => 'view', $event->id]);
                
            }

            $this->Flash->error(__('エラーがありました。'));
        }
        $this->set('user_id',    $this->Auth->user('id'));
        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set(compact('event'));
    }


    /**
     * イベント編集
     *
     * @param string|null $id イベントID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードが存在しない場合
     */
    public function edit($id = null)
    {
        $this->Common->referer();

        $event = $this->Events->get($id, ['contain' => ['Users']]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->getData());

            if ($this->Events->save($event)) {
                $this->Flash->success(__('イベント編集しました。'));

                return $this->redirect(['action' => 'view', $event->id]);
            }
            $this->Flash->error(__('エラーがありました。'));
        }

        // イベントが存在し、なおかつリファラーを抜けてもユーザーIDを認証する
        if ($event && $event->user_id === $this->Auth->user('id')) {
            $this->set('categories', $this->Common->valueToKey($this->categories));
            $this->set(compact('event'));
        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }
    }


    /**
     * 削除はフラグのみ更新
     *
     * @return \Cake\Http\Response|null
     *
     * @todo 【運用後】イベント管理実装で参加者にメール通知予定
     */
    public function delete()
    {
        $this->Common->referer();
        $this->autoRender = false;

        if ($this->request->is('ajax')) {

            $event = $this->Events->get($this->request->data['event_id']);
            $event = $this->Events->patchEntity($event, $this->request->data, ['validate' => false]);

            if ($this->Events->save($event)) {
                $this->response->body(json_encode($this->request->data));
                return $this->response;
            }

            return false;
        }
    }

}
