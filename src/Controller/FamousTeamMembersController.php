<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FamousTeamMembers Controller
 *
 * @property \App\Model\Table\FamousTeamMembersTable $FamousTeamMembers
 *
 * @method \App\Model\Entity\FamousTeamMember[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamousTeamMembersController extends AppController
{

    /**
     * 有名チームメンバー一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // メンバーを表示順で取得
        $famousTeamMembers = $this->FamousTeamMembers->find()->order(['FamousTeamMembers.display_order' => 'ASC'])->all();
        $member_count = count($famousTeamMembers);

        // チーム名のみ取得
        $famous_team = $this->FamousTeamMembers->FamousTeams
            ->findByUserId($this->Auth->user('id'))
            ->select(['FamousTeams.name'])
            ->first();

        $this->set(compact('famousTeamMembers', 'famous_team', 'member_count'));
    }


    /**
     * 有名チームメンバー登録
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $this->Common->referer();

        $famousTeamMember = $this->FamousTeamMembers->newEntity();
        $famous_team      = $this->FamousTeamMembers->FamousTeams
            ->findByUserId($this->Auth->user('id'))
            ->select(['FamousTeams.id', 'FamousTeams.name'])
            ->first();

        if ($this->request->is('post')) {

            $famousTeamMember = $this->FamousTeamMembers->patchEntity($famousTeamMember, $this->request->getData());

            if ($this->FamousTeamMembers->save($famousTeamMember)) {

                $this->Flash->success(__('チームメンバーを登録しました。'));
                return $this->redirect(['action' => 'index']);

            }
            $this->Flash->error(__('エラーがあります。入力項目を再確認してください。'));
        }
        $this->set(compact('famousTeamMember', 'famous_team'));
    }


    /**
     * 有名チームメンバー編集
     *
     * @param string|null $id Famous Team Member id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードが存在しない場合
     */
    public function edit($id = null)
    {
        $this->Common->referer();

        $famousTeamMember = $this->FamousTeamMembers->get($id);
        $famous_team      = $this->FamousTeamMembers->FamousTeams
            ->findByUserId($this->Auth->user('id'))
            ->select(['FamousTeams.id', 'FamousTeams.name'])
            ->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $famousTeamMember = $this->FamousTeamMembers->patchEntity($famousTeamMember, $this->request->getData());
            if ($this->FamousTeamMembers->save($famousTeamMember)) {
                $this->Flash->success(__('メンバー情報を編集しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('エラーがあります。入力項目を再確認してください。'));
        }

        $this->set(compact('famousTeamMember', 'famous_team', 'famousDancers'));
    }


    /**
     * 有名チームメンバー削除
     *
     * @param string|null $id
     * @return \Cake\Http\Response|null index
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function delete($id = null)
    {
        $this->Common->referer();
        $this->request->allowMethod(['post', 'delete']);
        $famousTeamMember = $this->FamousTeamMembers->get($id);

        // 画像も同時に削除する
        if (!is_null($famousTeamMember->image)) {
            // delete_img1にファイルパス代入
            $this->request->data['delete_img1'] = $famousTeamMember->image;
            // イメージ削除
            $this->ImageFile->isSelectedDelete($this->request->data, 'famous_team_member', 1);
        }

        if ($this->FamousTeamMembers->delete($famousTeamMember)) {
            $this->Flash->success(__('メンバーを削除しました。'));
        } else {
            $this->Flash->error(__('削除できません。解決しない場合はフィードバックよりお問い合わせください。'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
