<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Organizers Controller
 *
 * @property \App\Model\Table\OrganizersTable $Organizers
 *
 * @method \App\Model\Entity\Organizer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrganizersController extends AppController
{

    /**
     * ホーム - 初期登録時、プロフィール未作成の場合、強制的にaddアクションへ
     *
     * @param int $id ユーザーID
     * @return redirect add 初期登録の場合のみ
     *
     */
    public function home($id)
    {
        if ($id) {

            $query = $this->Organizers->findByUserId($id)->contain(['Users']);
            $organizer = $query->first();

            if (!$organizer) {
                $this->Flash->default(__('最初にプロフィールを作成しましょう。'));
                $this->redirect(['action' => 'add', $id]);
            }

            $organizer['user']['classification'] = $this->Common->getCategoryName($organizer['user']['classification']);
            // メッセージ未読数取得
            $message_number = $this->Organizers->Users->Messages->findByToUserIdAndReadFlag($id, 0)->count();
            // お知らせ最新1か月以内を3件のみ取得
            $this->loadModel('Informations');
            $informations = $this->Informations->find()->where(['Informations.created >' => new \DateTime('-1 months')])->limit(3)->all();

            $this->set(compact('organizer', 'message_number', 'informations'));

        } else {
            // 強制ログアウト → 最初から操作させる
            $this->Flash->error(__('ユーザー情報を取得できません。最初からやり直してください。'));
            return $this->redirect($this->Auth->logout());
        }
    }
    

    /**
     * プロフィール詳細 - findはユーザIDで検索
     *
     * @param string $id ユーザーID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     *
     * @todo リフェラー
     */
    public function view($id)
    {
        $query = $this->Organizers->findByUserId($id)->contain(['Users']);
        $organizer = $query->first();

        $organizer['youtube'] = $this->Common->getYoutubeId($organizer['youtube']);

        // ユーザ区分をカテゴリ名で取得
        $organizer['user']['classification'] = $this->Common->getCategoryName($organizer['user']['classification']);
        $this->set('organizer', $organizer);
    }


    /**
     * プロフィール登録
     *
     * @param int $id ユーザーID
     * @return \Cake\Http\Response|null 登録成功の場合はviewへ
     *
     * @todo リフェラー
     */
    public function add($id)
    {
        $this->viewBuilder()->setLayout('add');

        $organizer = $this->Organizers->newEntity();

        if ($this->request->is('post')) {

            $organizer = $this->Organizers->patchEntity($organizer, $this->request->getData());

            if ($this->Organizers->save($organizer)) {
                $this->Flash->success(__('プロフィール作成しました。メニューが使用できるようになりました。'));
                return $this->redirect(['action' => 'view', $organizer->user_id]);
            }

            $this->Flash->error(__('エラーがあります。'));
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set('user_id', $id);
        $this->set(compact('organizer'));
    }


    /**
     * 編集
     *
     * @param string $id ユーザID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException - レコードが存在しない場合
     *
     * @todo リフェラー
     */
    public function edit($id)
    {
        $query = $this->Organizers->findByUserId($id)->contain(['Users']);
        $organizer = $query->first();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $organizer = $this->Organizers->patchEntity($organizer, $this->request->getData());
            if ($this->Organizers->save($organizer)) {
                $this->Flash->success(__('更新しました。'));
                return $this->redirect(['action' => 'view', $organizer->user_id]);
            }
            $this->Flash->error(__('エラーがあります。'));
        }

        $video = '';
        $video = $this->Common->getYoutubeId($organizer['youtube']);

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('organizer', 'video'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Organizer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organizer = $this->Organizers->get($id);
        if ($this->Organizers->delete($organizer)) {
            $this->Flash->success(__('The organizer has been deleted.'));
        } else {
            $this->Flash->error(__('The organizer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
