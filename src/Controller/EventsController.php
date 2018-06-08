<?php
namespace App\Controller;

use App\Controller\AppController;
use ArrayObject;

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
     * マイリスト - 登録済みイベント一覧
     *
     * @param int $id ユーザーID
     * @return void
     */
    public function list($id)
    {
        $events = $this->paginate($this->Events->findByUserId($id));

        $this->set(compact('events'));
        $this->set('id', $id);
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
            $events = $this->paginate($this->Events);
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

        $event = $this->Events->get($id, [
            'contain' => ['Users']
        ]);

        $event['youtube'] = $this->Common->getYoutubeId($event['youtube']);
        // オーナー検索
        $event['owner'] = $this->Common->getUsersByClassification($event['user']['classification'], $event->user_id);
        // 区分リンク取得
        $profile_links = $this->Common->linkSwitch($event['user']['classification'], 'view', $event->user_id);
        // 区分カテゴリ名取得
        $event['user']['classification'] = $this->Common->getCategoryName($event['user']['classification']);

        $this->set(compact('profile_links'));
        $this->set('event', $event);
    }


    /**
     * イベント登録
     *
     * @param int $id ユーザーID
     * @return redirect view イベントID付与
     */
    public function add($id)
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
        $this->set('user_id', $id);
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
        $event = $this->Events->get($id, ['contain' => ['Users']]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->getData());

            if ($this->Events->save($event)) {
                $this->Flash->success(__('イベント編集しました。'));

                return $this->redirect(['action' => 'view', $event->id]);
            }
            $this->Flash->error(__('エラーがありました。'));
        }

        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set(compact('event'));
    }


    /**
     * Delete method - イベント削除は原則できないことにする。管理者のみ可
     *
     * @param string|null $id イベントID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);

        if ($this->Events->delete($event)) {
            $this->Flash->success(__('イベント削除しました。'));
        } else {
            $this->Flash->error(__('イベント削除できません。解決しない場合はフィードバックより報告ください。'));
        }

        return $this->redirect(['action' => 'list', $event->user_id]);
    }
}
