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
     * @param string|null $id ユーザーID
     * @return redirect add 初期登録の場合のみ
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function home($id = null)
    {
        if ($id) {

            if ((int)$id === $this->Auth->user('id')) {

                $organizer = $this->Organizers->findByUserId($id)->contain(['Users'])->first();

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
                throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
            }

        } else {
            // 強制ログアウト → 最初から操作させる
            $this->Flash->error(__('ユーザー情報を取得できません。最初からやり直してください。'));
            return $this->redirect($this->Auth->logout());
        }
    }


    /**
     * プロフィール詳細
     *
     * @param string|null $id ユーザーID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function view($id = null)
    {
        $organizer = $this->Organizers->findByUserId($id)->contain(['Users'])->first();

        if ($organizer) {

            $organizer['youtube'] = $this->Common->getYoutubeId($organizer['youtube']);
            // ユーザ区分をカテゴリ名で取得
            $organizer['user']['classification'] = $this->Common->getCategoryName($organizer['user']['classification']);
            $this->set('organizer', $organizer);

        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }
    }


    /**
     * オーガナイザープロフィール登録
     *
     * @param string|null $id ユーザーID
     * @return \Cake\Http\Response|null 登録成功の場合はviewへ
     */
    public function add($id = null)
    {
        $this->Common->referer();

        $this->viewBuilder()->setLayout('add');

        $user = $this->Organizers->Users->findByIdAndRegisterFlagAndClassification($id, 1, 2)->first();

        if ($user) {

            // 既に区分プロフィール作成済みか
            $profile = $this->Organizers->findByUserId($user->id)->first();

            // プロフィール未作成で、取得ユーザーIDがログインユーザーIDと一致すれば許可
            if (!$profile && $user->id === $this->Auth->user('id')) {

                $organizer = $this->Organizers->newEntity();

                if ($this->request->is('post')) {

                    $organizer = $this->Organizers->patchEntity($organizer, $this->request->getData());

                    if ($this->Organizers->save($organizer)) {
                        $this->Flash->success(__('プロフィール作成しました。メニューが使用できるようになりました。'));
                        return $this->redirect(['action' => 'view', $organizer->user_id]);
                    }

                    $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックよりお問い合わせください。'));
                }

                $this->set('genres',  $this->Common->valueToKey($this->genres));
                $this->set('user_id', $id);
                $this->set(compact('organizer'));

            } else {
                throw new NotFoundException(__('404 不正なアクセスまたはコンテンツが見つかりません。'));
            }

        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはコンテンツが見つかりません。'));
        }
    }


    /**
     * オーガナイザープロフィール編集
     *
     * @param string|null $id ユーザID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException - レコードが存在しない場合
     */
    public function edit($id = null)
    {
        $this->Common->referer();

        $organizer = $this->Organizers->findByUserId($id)->contain(['Users'])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $organizer = $this->Organizers->patchEntity($organizer, $this->request->getData());

            if ($this->Organizers->save($organizer)) {
                $this->Flash->success(__('プロフィール更新しました。'));
                return $this->redirect(['action' => 'view', $organizer->user_id]);
            }

            $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックよりお問い合わせください。'));
        }

        if ($organizer && (int)$organizer->user_id === $this->Auth->user('id')) {

            $video = '';
            $video = $this->Common->getYoutubeId($organizer['youtube']);

            $this->set('genres', $this->Common->valueToKey($this->genres));
            $this->set(compact('organizer', 'video'));

        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }

    }

}
