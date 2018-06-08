<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CircleGroups Controller
 *
 * @property \App\Model\Table\CircleGroupsTable $CircleGroups
 *
 * @method \App\Model\Entity\CircleGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CircleGroupsController extends AppController
{

    public $paginate = [
        'limit' => 16,
        'order' => ['CircleGroups.created' => 'desc']
    ];

    /**
     * サークルメンバー一覧
     *
     * 参加者のみがリストを閲覧できる。メッセージを送ったり、各プロフィールを確認できる。
     * サークルメッセージを選択することもできる。
     *
     * @param int $circle_id サークルID

     * @return \Cake\Http\Response|void
     * @todo リフェラー
     */
    public function index($circle_id)
    {
        $circle = $this->CircleGroups->Circles->findById($circle_id)->first();
        $query  = $this->CircleGroups->findByCircleId($circle_id)->contain(['Users']);

        $circle_groups = $this->paginate($query)->toArray();

        // サークルグループメンバー各プロフィールリンク取得
        for ($i = 0; $i < count($circle_groups); $i++) {
            $circle_groups[$i]['profile'] = $this->Common->getUsersByClassification($circle_groups[$i]['user']['classification'], $circle_groups[$i]['user_id']);
            $circle_groups[$i]['user']['classification'] = $this->Common->getCategoryName($circle_groups[$i]['user']['classification']);
            $circle_groups[$i]['link'] = $this->Common->linkSwitch($circle_groups[$i]['user']['classification'], 'view', $circle_groups[$i]['user_id']);
        }

        $this->set(compact('circle', 'circle_groups'));
    }


    /**
     * サークルグループ登録 (依頼も含む)
     *
     * @return \Cake\Http\Response|null
     *
     * @todo リフェラー
     * @todo サークルオーナーにメール配信
     */
    public function add()
    {
        $this->autoRender = false;
        $circleGroup = $this->CircleGroups->newEntity();

        if ($this->request->is('post')) {

            // ユーザーIDを基にサークルグループがいくつあるか
            $join_count  = $this->CircleGroups->findByUserId($this->request->data['user_id'])->count();
            $circleGroup = $this->CircleGroups->patchEntity($circleGroup, $this->request->getData());

            // 参加数が5つになっている場合は登録拒否
            if ($join_count >= 5) {
                $this->Flash->error(__('サークル参加できません。サークル参加数が最大の5つに達しています。'));
                return $this->redirect(['controller' => 'circles', 'action' => 'view', $circleGroup->circle_id, $circleGroup->user_id]);
            }

            if ($this->CircleGroups->save($circleGroup)) {

                $this->Flash->success(__('サークル参加しました。マイサークルで状態を確認できます。'));
                return $this->redirect(['controller' => 'circles', 'action' => 'view', $circleGroup->circle_id, $circleGroup->user_id]);
            }
            $this->Flash->error(__('サークル参加できません。フィードバックよりお問合せください。'));
        }
    }


    /**
     * サークル参加削除
     *
     * @param string|null $id サークルグループID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $circleGroup = $this->CircleGroups->get($id);

        if ($this->CircleGroups->delete($circleGroup)) {
            $this->Flash->success(__('サークル参加を取り消しました。'));
        } else {
            $this->Flash->error(__('サークル参加を取り消しできません。フィードバックよりお問い合わせください。'));
        }

        return $this->redirect(['controller' => 'circles', 'action' => 'list', $circleGroup->user_id]);
    }
}
