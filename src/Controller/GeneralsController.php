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
     * @return redirect add 初期登録の場合のみ
     *
     */
    public function home()
    {
        $general = $this->Generals->findByUserId($this->Auth->user('id'))->contain(['Users'])->first();

        if (!$general) {
            $this->Flash->default(__('最初にプロフィールを作成しましょう。'));
            $this->redirect(['action' => 'add']);
        }

        $general['user']['classification'] = $this->Common->getCategoryName($general['user']['classification']);
        // メッセージ未読数取得
        $message_number = $this->Generals->Users->Messages->findByToUserIdAndReadFlag($this->Auth->user('id'), 0)->count();
        // お知らせ最新1か月以内を3件のみ取得
        $this->loadModel('Informations');
        $informations = $this->Informations->find()->where(['Informations.created >' => new \DateTime('-1 months')])->limit(3)->all();

        $this->set(compact('general', 'message_number', 'informations'));
    }


    /**
     * 一般プロフィール詳細
     *
     * @param string|null $id ユーザーID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function view($id = null)
    {
        $general = $this->Generals->findByUserId($id)->contain(['Users'])->first();

        if ($general) {
            // ユーザ区分をカテゴリ名で取得
            $general['user']['classification'] = $this->Common->getCategoryName($general['user']['classification']);
            $this->set('general', $general);
        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }

    }


    /**
     * プロフィール登録
     *
     * @return \Cake\Http\Response|null 登録成功の場合はviewへ
     */
    public function add()
    {
        $this->Common->referer();

        $this->viewBuilder()->setLayout('add');

        // 区分ユーザーが存在し、本登録済みか
        $user = $this->Generals->Users->findByIdAndRegisterFlagAndClassification($this->Auth->user('id'), 1, 3)->first();

        if ($user) {
            // そのユーザーは既に一度プロフィール登録しているか
            $profile = $this->Generals->findByUserId($user->id)->first();

            if (!$profile) {

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
                $this->set(compact('general'));
            } else {
                $this->Auth->logout();
                throw new NotFoundException(__('404 不正なアクセスまたはコンテンツが見つかりません。'));
            }
        } else {
            $this->Auth->logout();
            throw new NotFoundException(__('404 不正なアクセスまたはコンテンツが見つかりません。'));
        }
    }


    /**
     * 一般ユーザー編集
     *
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException - レコードが存在しない場合
     */
    public function edit()
    {
        $this->Common->referer();

        $general = $this->Generals->findByUserId($this->Auth->user('id'))->contain(['Users'])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $general = $this->Generals->patchEntity($general, $this->request->getData());
            if ($this->Generals->save($general)) {
                $this->Flash->success(__('プロフィールを更新しました。'));
                return $this->redirect(['action' => 'view', $general->user_id]);
            }
            $this->Flash->error(__('プロフィール編集できません。解決しない場合はフィードバックより報告してください。'));
        }

        if ($general) {

            $this->set('genres', $this->Common->valueToKey($this->genres));
            $this->set(compact('general'));

        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }
    }

}
