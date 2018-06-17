<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Generals Controller
 *
 * @property \App\Model\Table\GeneralsTable $Generals
 *
 * @method \App\Model\Entity\General[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GeneralsController extends AppController
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

            $query = $this->Generals->findByUserId($id)->contain(['Users']);
            $general = $query->first();

            if (!$general) {
                $this->Flash->default(__('最初にプロフィールを作成しましょう。'));
                $this->redirect(['action' => 'add', $id]);
            }

            $general['user']['classification'] = $this->Common->getCategoryName($general['user']['classification']);
            // メッセージ未読数取得
            $message_number = $this->Generals->Users->Messages->findByToUserIdAndReadFlag($id, 0)->count();
            // お知らせ最新1か月以内を3件のみ取得
            $this->loadModel('Informations');
            $informations = $this->Informations->find()->where(['Informations.created >' => new \DateTime('-1 months')])->limit(3)->all();

            $this->set(compact('general', 'message_number', 'informations'));
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
        $query = $this->Generals->findByUserId($id)->contain(['Users']);
        $general = $query->first();

        // ユーザ区分をカテゴリ名で取得
        $general['user']['classification'] = $this->Common->getCategoryName($general['user']['classification']);
        $this->set('general', $general);
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

        // 区分ユーザーが存在し、本登録済みか
        $user = $this->Generals->Users->findByIdAndRegisterFlagAndClassification($id, 1, 3)->first();

        if ($user) {
            // そのユーザーは既に一度プロフィール登録しているか
            $profile = $this->Generals->findByUserId($user->id)->first();

            if (!$profile && $user->id === $this->Auth->user('id')) {

                $general = $this->Generals->newEntity();

                if ($this->request->is('post')) {

                    $general = $this->Generals->patchEntity($general, $this->request->getData());

                    if ($this->Generals->save($general)) {
                        $this->Flash->success(__('プロフィール作成しました。メニューが使用できるようになりました。'));
                        return $this->redirect(['action' => 'view', $general->user_id]);
                    }

                    $this->Flash->error(__('プロフィール作成できません。解決しない場合はフィードバックより報告してください。'));
                }

                $this->set('genres', $this->Common->valueToKey($this->genres));
                $this->set('user_id', $id);
                $this->set(compact('general'));
            } else {
                throw new NotFoundException(__('404 不正なアクセスまたはコンテンツが見つかりません。'));
            }
        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはコンテンツが見つかりません。'));
        }
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
        $query = $this->Generals->findByUserId($id)->contain(['Users']);
        $general = $query->first();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $general = $this->Generals->patchEntity($general, $this->request->getData());
            if ($this->Generals->save($general)) {
                $this->Flash->success(__('プロフィールを更新しました。'));
                return $this->redirect(['action' => 'view', $general->user_id]);
            }
            $this->Flash->error(__('プロフィール編集できません。解決しない場合はフィードバックより報告してください。'));
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('general'));
    }


    /**
     * Delete method
     *
     * @param string|null $id General id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $general = $this->Generals->get($id);
        if ($this->Generals->delete($general)) {
            $this->Flash->success(__('The general has been deleted.'));
        } else {
            $this->Flash->error(__('The general could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
