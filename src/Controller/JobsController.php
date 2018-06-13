<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;
use Cake\Event\Event;

/**
 * ダンス関連求人コントローラー
 *
 * @property \App\Model\Table\JobsTable $Jobs
 */
class JobsController extends AppController
{
    public $categories  = ['インストラクター', '教育関連', 'バックダンサー', '振付'];
    public $search_keys = ['pref', 'category', 'word'];

    public $paginate = [
        'limit'   => 20,
        'order'   => ['Jobs.created' => 'desc'],
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
     * マイリスト - 登録済み求人一覧
     *
     * @param int $id ユーザーID
     * @return void
     */
    public function list($id)
    {
        $jobs = $this->paginate($this->Jobs->findByUserIdAndDeleteFlag($id, 0));

        $this->set(compact('jobs'));
        $this->set('id', $id);
    }


    /**
     * ダンス関連求人一覧
     *
     * @return \Cake\Http\Response|void
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

            $query = $this->Jobs->findBySearch($this->request->query);
            $jobs = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('job_search_request', $this->request->query);

        } else {
            $query = $this->Jobs->findByPublicFlagAndDeleteFlag(0, 0);
            $jobs = $this->paginate($query);
        }

        // 検索項目状態があればリード
        if ($this->Session->check('job_search_request')) {
            $this->request->data = $this->Session->read('job_search_request');
        }

        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set(compact('jobs'));
    }


    /**
     * 求人詳細
     *
     * @param string|null $id 求人ID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, ['contain' => ['Users']]);

        // オーナー検索
        $job['owner'] = $this->Common->getUsersByClassification($job['user']['classification'], $job->user_id);
        // 区分リンク取得
        $profile_links = $this->Common->linkSwitch($job['user']['classification'], 'view', $job->user_id);
        // 区分カテゴリ名取得
        $job['user']['classification'] = $this->Common->getCategoryName($job['user']['classification']);

        $this->set(compact('profile_links'));
        $this->set('job', $job);
    }


    /**
     * 求人登録
     *
     * @return \Cake\Http\Response|null
     */
    public function add($id)
    {
        $job = $this->Jobs->newEntity();

        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('登録しました。'));
                return $this->redirect(['action' => 'view', $job->id]);
            }
            $this->Flash->error(__('エラーがあります。'));
        }

        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set('user_id', $id);
        $this->set(compact('job'));
    }


    /**
     * 求人内容編集
     *
     * @param string|null $id 求人ID
     * @return \Cake\Http\Response|null Redirects
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $job = $this->Jobs->patchEntity($job, $this->request->getData());

            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('求人内容を編集しました。'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('エラーがありました。'));
        }

        $this->set('categories', $this->Common->valueToKey($this->categories));
        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('job'));
    }


    /**
     * 削除はフラグのみ更新
     *
     * @return \Cake\Http\Response|null
     *
     * @todo 【運用後】ダンス求人管理実装で参加者にメール通知予定
     */
    public function delete()
    {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {

            $job = $this->Jobs->get($this->request->data['job_id']);
            $job = $this->Jobs->patchEntity($job, $this->request->data, ['validate' => false]);

            if ($this->Jobs->save($job)) {
                $this->response->body(json_encode($this->request->data));
                return $this->response;
            }

            return false;
        }
    }


}
