<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;

/**
 * Circles Controller
 *
 * @property \App\Model\Table\CirclesTable $Circles
 *
 * @method \App\Model\Entity\Circle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CirclesController extends AppController
{
    use MailerAwareTrait;

    public $ages         = ['10代', '20代', '30代', '40代', '50代', '60代'];
    public $distinctions = ['メンバー募集', '紹介のみ'];
    public $search_keys  = ['pref', 'genre', 'word'];

    public $paginate = [
        'limit'   => 20,
        'order'   => ['Circles.created' => 'desc'],
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
     * マイサークル (所属しているサークル一覧表示)
     *
     * @param int $id ユーザーID
     * @todo 参加しているサークルの呼び出し
     */
    public function list($id)
    {
        // 登録済みサークル
        $circles = $this->Circles->findByUserIdAndDeleteFlag($id, 0)->all();

        // 参加済みサークル
        $circle_groups = $this->Circles->CircleGroups->findByUserId($id)->contain('Circles', function ($q) {
                return $q->where(['Circles.delete_flag' => 0]);
        })->all();

        $this->set(compact('circles', 'circle_groups'));
        $this->set('id', $id);
    }


    /**
     * サークルホーム
     * 参加者がホームでサークルのお知らせや、メンバーリスト、グループメッセージを送ったりできる
     *
     * @param int $circle_id サークルID
     * @param int $user_id   ユーザーID
     *
     * @todo リフェラー
     */
    public function home($circle_id, $user_id)
    {
        $circle = $this->Circles->get($circle_id, ['contain' => ['Users']]);

        // オーナー検索
        $circle['owner'] = $this->Common->getUsersByClassification($circle['user']['classification'], $circle->user_id);
        // 区分リンク取得
        $profile_links = $this->Common->linkSwitch($circle['user']['classification'], 'view', $circle->user_id);
        // 区分カテゴリ名取得
        $circle['user']['classification'] = $this->Common->getCategoryName($circle['user']['classification']);

        // サークルメッセージ呼び出し
        $circle_messages = $this->Circles->CircleMessages->findByCircleId($circle_id)
            ->contain(['Users'])
            ->order(['CircleMessages.modified' => 'DESC'])
            ->limit(20)
            ->all();

        // サークルメンバー呼び出し
        $circle_members = $this->Circles->CircleGroups->findByCircleId($circle_id)
            ->contain(['Users'])
            ->order(['CircleGroups.created' => 'DESC'])
            ->limit(20)
            ->toArray();

        // 必要なプロフィールを取得
        for ($i = 0; $i < count($circle_members); $i++) {
            $circle_members[$i]['profile'] = $this->Common->getUsersByClassification($circle_members[$i]['user']['classification'], $circle_members[$i]['user_id']);
            $circle_members[$i]['user']['classification'] = $this->Common->getCategoryName($circle_members[$i]['user']['classification']);
            $circle_members[$i]['link'] = $this->Common->linkSwitch($circle_members[$i]['user']['classification'], 'view', $circle_members[$i]['user_id']);
        }

        $this->set(compact('circle', 'circle_messages', 'circle_members', 'profile_links'));
    }


    /**
     * サークル検索 一覧
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

            $query   = $this->Circles->findBySearch($this->request->query);
            $circles = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('circle_search_request', $this->request->query);

        } else {
            $query   = $this->Circles->findByPublicFlagAndDeleteFlag(0, 0);
            $circles = $this->paginate($query);
        }

        // 検索項目状態があればリード
        if ($this->Session->check('circle_search_request')) {
            $this->request->data = $this->Session->read('circle_search_request');
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('circles'));
    }


    /**
     * サークル詳細
     *
     * @param int $id      サークルID
     * @param int $user_id ユーザーID 閲覧者が参加しているか否かに利用
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードが存在しない場合
     *
     * @todo リフェラー
     */
    public function view($id, $user_id)
    {
        $circle = $this->Circles->get($id, ['contain' => ['Users']]);

        // 既にイベント参加依頼しているか検索
        $join_flag = $this->Circles->CircleGroups->findByCircleIdAndUserId($id, $user_id)->count();
        // オーナー検索
        $circle['owner'] = $this->Common->getUsersByClassification($circle['user']['classification'], $circle->user_id);
        // 区分リンク取得
        $profile_links = $this->Common->linkSwitch($circle['user']['classification'], 'view', $circle->user_id);
        // 区分カテゴリ名取得
        $circle['user']['classification'] = $this->Common->getCategoryName($circle['user']['classification']);

        // サークルメンバー呼び出し
        $circle_members = $this->Circles->CircleGroups->findByCircleId($id)
            ->contain(['Users'])
            ->order(['CircleGroups.created' => 'DESC'])
            ->limit(10)
            ->toArray();

        // 必要なプロフィールを取得
        for ($i = 0; $i < count($circle_members); $i++) {
            $circle_members[$i]['profile'] = $this->Common->getUsersByClassification($circle_members[$i]['user']['classification'], $circle_members[$i]['user_id']);
            $circle_members[$i]['user']['classification'] = $this->Common->getCategoryName($circle_members[$i]['user']['classification']);
            $circle_members[$i]['link'] = $this->Common->linkSwitch($circle_members[$i]['user']['classification'], 'view', $circle_members[$i]['user_id']);
        }

        $this->set(compact('circle', 'circle_members', 'profile_links', 'join_flag'));
        $this->set('genres', $this->Common->valueToKey($this->genres));
    }


    /**
     * サークル登録
     *
     * @param int $id ユーザーID
     * @return \Cake\Http\Response|null
     */
    public function add($id)
    {
        $circle = $this->Circles->newEntity();

        if ($this->request->is('post')) {

            $circle = $this->Circles->patchEntity($circle, $this->request->getData());

            // 現在のサークル所持数をカウント
            $circle_count = $this->Circles->findByUserIdAndDeleteFlag($circle->user_id, 0)->count();

            // サークル5つ所持時点で登録させない
            if ($circle_count <= 5) {
                if ($this->Circles->save($circle)) {
                    $this->Flash->success(__('サークル作成しました。'));
                    return $this->redirect(['action' => 'view', $circle->id, $circle->user_id]);
                }
                $this->Flash->error(__('エラーがありました。'));
            } else {
                $this->Flash->error(__('サークルは最大5つまでしか保持できません。'));
            }

        }

        $this->set('distinctions', $this->Common->valueToKey($this->distinctions));
        $this->set('ages',         $this->Common->valueToKey($this->ages));
        $this->set('genres',       $this->Common->valueToKey($this->genres));
        $this->set('user_id', $id);
        $this->set(compact('circle'));
    }


    /**
     * サークル編集
     *
     * @param string|null $id サークルID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードが存在しない場合
     */
    public function edit($id = null)
    {
        $circle = $this->Circles->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $circle = $this->Circles->patchEntity($circle, $this->request->getData());

            if ($this->Circles->save($circle)) {
                $this->Flash->success(__('サークルを編集しました。'));
                return $this->redirect(['action' => 'view', $id, $circle->user_id]);
            }
            $this->Flash->error(__('エラーがあります。再度確認してください。'));
        }

        $this->set('distinctions', $this->Common->valueToKey($this->distinctions));
        $this->set('ages',         $this->Common->valueToKey($this->ages));
        $this->set('genres',       $this->Common->valueToKey($this->genres));
        $this->set(compact('circle'));
    }


    /**
     * 削除はフラグのみ更新
     *
     * @param string|null $id サークルID
     * @return \Cake\Http\Response|null
     */
    public function delete()
    {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {

            $circle = $this->Circles->get($this->request->data['circle_id']);
            $circle = $this->Circles->patchEntity($circle, $this->request->data, ['validate' => false]);

            if ($this->Circles->save($circle)) {

                if (SEND_MAIL_FUNCTION === 0) {
                    // サークル所有者を検索
                    $from_user = $this->Circles->Users->findById($circle->user_id)->first();
                    // サークルメンバーを検索
                    $this->loadModel('CircleGroups');
                    $circleGroups = $this->CircleGroups->findByCircleId($circle->id)->all();

                    // サークルメンバー全員にメール送信
                    foreach ($circleGroups as $circleGroup) {
                        $to_user = $this->Circles->Users->findById($circleGroup->user_id)->first();
                        $circle  = $this->Circles->findById($circle->id)->first();
                        $this->getMailer('Circle')->send('circle_delete_message', [$to_user, $from_user, $circle]);
                    }
                }

                $this->response->body(json_encode($this->request->data));
                return $this->response;
            }

            return false;
        }
    }

}
