<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

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
     * @return redirect add 初期登録の場合のみ
     */
    public function home()
    {
        $organizer = $this->Organizers->findByUserId($this->Auth->user('id'))->contain(['Users'])->first();

        if (!$organizer) {
            $this->Flash->default(__('最初にプロフィールを作成しましょう。'));
            $this->redirect(['action' => 'add']);
        }

        $organizer['user']['classification'] = $this->Common->getCategoryName($organizer['user']['classification']);
        // メッセージ未読数取得
        $message_number = $this->Organizers->Users->Messages->findByToUserIdAndReadFlag($this->Auth->user('id'), 0)->count();
        // お知らせ最新1か月以内を3件のみ取得
        $this->loadModel('Informations');
        $informations = $this->Informations->find()->where(['Informations.created >' => new \DateTime('-1 months')])->limit(3)->all();

        $this->set(compact('organizer', 'message_number', 'informations'));
    }


    /**
     * プロフィール詳細
     *
     * @param string|null $username ユーザー名
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function view($username = null)
    {
        $user = $this->Organizers->Users->findByUsername($username)->first();

        if ($user) {

            $organizer = $this->Organizers->findByUserId($user->id)->first();
            $organizer->user = $user;

            $organizer['youtube'] = $this->Common->getYoutubeId($organizer['youtube']);
            // ユーザ区分をカテゴリ名で取得
            $organizer['user']['classification'] = $this->Common->getCategoryName($organizer['user']['classification']);
            $this->set('organizer', $organizer);
            // メッセージ用変数
            $this->set('to_user_id',  $organizer->user->id);
            $this->set('to_username', $organizer->user->username);
        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }

    }


    /**
     * オーガナイザープロフィール登録
     *
     * @return \Cake\Http\Response|null 登録成功の場合はviewへ
     */
    public function add()
    {
        $this->Common->referer();

        $this->viewBuilder()->setLayout('add');

        $user = $this->Organizers->Users->findByIdAndRegisterFlagAndClassification($this->Auth->user('id'), 1, 2)->first();

        if ($user) {

            // 既に区分プロフィール作成済みか
            $profile = $this->Organizers->findByUserId($user->id)->first();

            // プロフィール未作成で許可
            if (!$profile) {

                $organizer = $this->Organizers->newEntity();

                if ($this->request->is('post')) {

                    $organizer = $this->Organizers->patchEntity($organizer, $this->request->getData());

                    if ($this->Organizers->save($organizer)) {
                        $this->Flash->success(__('プロフィール作成しました。メニューが使用できるようになりました。'));
                        return $this->redirect(['action' => 'view', $user->username]);
                    }

                    $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックよりお問い合わせください。'));
                }

                $this->set('genres',  $this->Common->valueToKey($this->genres));
                $this->set(compact('organizer'));

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
     * オーガナイザープロフィール編集
     *
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException - レコードが存在しない場合
     */
    public function edit()
    {
        $this->Common->referer();

        $organizer = $this->Organizers->findByUserId($this->Auth->user('id'))->contain(['Users'])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $organizer = $this->Organizers->patchEntity($organizer, $this->request->getData());

            if ($this->Organizers->save($organizer)) {
                $this->Flash->success(__('プロフィール更新しました。'));
                return $this->redirect(['action' => 'view', $organizer->user->username]);
            }

            $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックよりお問い合わせください。'));
        }

        if ($organizer) {

            $video = '';
            $video = $this->Common->getYoutubeId($organizer['youtube']);

            $this->set('genres', $this->Common->valueToKey($this->genres));
            $this->set(compact('organizer', 'video'));

        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }

    }

}
