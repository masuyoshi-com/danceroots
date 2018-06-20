<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use Cake\Network\Exception\NotFoundException;

/**
 * CircleMessages Controller
 *
 * @property \App\Model\Table\CircleMessagesTable $CircleMessages
 *
 * @method \App\Model\Entity\CircleMessage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CircleMessagesController extends AppController
{
    use MailerAwareTrait;

    public $search_keys = ['word'];

    public $paginate = [
           'limit' => 20,
           'order' => ['CircleMessages.created' => 'desc']
     ];


    /**
     * サークルメッセージ一覧
     *
     * @param string|null $circle_id サークルID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function index($circle_id = null)
    {
        $circle = $this->CircleMessages->Circles->get($circle_id);

        if ($circle) {

            $this->loadModel('CircleGroups');

            // ログインIDがサークルに所属しているか検索
            $member = $this->CircleGroups->findByCircleIdAndUserId($circle_id, $this->Auth->user('id'))->first();

            // サークルオーナーかサークルメンバーである場合
            if ($circle->user_id === $this->Auth->user('id') || count($member) === 1) {

                if ($this->request->query) {

                    // 検索クエリがなければfindBySearchで警告でないように空白状態を作成
                    for ($i = 0; $i < count($this->search_keys); $i++) {
                        if (!isset($this->request->query[$this->search_keys[$i]])) {
                            $this->request->query[$this->search_keys[$i]] = '';
                        }
                    }

                    $circle_messages = $this->CircleMessages->findBySearch($circle_id, $this->request->query)->contain(['Users']);

                    // 検索項目状態をセッションに格納
                    $this->Session->write('cirle_messages_search_request', $this->request->query);

                } else {
                    $circle_messages = $this->CircleMessages->findByCircleId($circle_id)->contain(['Users']);
                }

                // 検索項目状態があればリード
                if ($this->Session->check('cirle_messages_search_request')) {
                    $this->request->data = $this->Session->read('cirle_messages_search_request');
                }

                $this->set(compact('circle'));
                $this->set('circle_messages', $this->paginate($circle_messages));

            } else {
                throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
            }
        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }

    }


    /**
     * サークルメッセージ詳細
     *
     * @param string|null $message_id サークルメッセージID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function view($message_id = null)
    {
        $this->Common->referer();

        $circle_message = $this->CircleMessages->get($message_id, ['contain' => ['Users']]);

        // オーナー検索
        $circle_message['owner'] = $this->Common->getUsersByClassification($circle_message['user']['classification'], $circle_message->user_id);
        $profile_links = $this->Common->linkSwitch($circle_message['user']['classification'], 'view', $circle_message->user_id);

        $this->set('profile_links',  $profile_links);
        $this->set('circle_message', $circle_message);
    }


    /**
     * サークルメッセージ作成
     *
     * @param string|null $circle_id サークルID
     * @return \Cake\Http\Response|null
     */
    public function add($circle_id = null)
    {
        $this->Common->referer();

        $from_user = $this->CircleMessages->Users->findById($this->Auth->user('id'))->first();
        $circleMessage = $this->CircleMessages->newEntity();

        if ($this->request->is('post')) {

            $circleMessage = $this->CircleMessages->patchEntity($circleMessage, $this->request->getData());

            if ($this->CircleMessages->save($circleMessage)) {

                // メール機能がONの場合
                if (SEND_MAIL_FUNCTION === 0) {

                    $circle = $this->CircleMessages->Circles->findById($circleMessage->circle_id)->first();

                    // メッセージ作成者がサークルオーナーではない場合オーナーにもメール通知(オーナーがメッセージ作成していない場合)
                    if ($from_user->id !== $circle->user_id) {
                        $owner = $this->CircleMessages->Users->findById($circle->user_id)->first();
                        $this->getMailer('CircleMessage')->send('circle_message', [$owner, $from_user, $circleMessage, $circle]);
                    }

                    // サークルメンバーを検索
                    $this->loadModel('CircleGroups');
                    $circleGroups = $this->CircleGroups->findByCircleId($circleMessage->circle_id)->all();

                    // サークルメンバー全員にメール送信
                    foreach ($circleGroups as $circleGroup) {

                        $to_user = $this->CircleMessages->Users->findById($circleGroup->user_id)->first();

                        // メッセージ作成者はメール配信除外
                        if ($from_user->id !== $to_user->id) {
                            $this->getMailer('CircleMessage')->send('circle_message', [$to_user, $from_user, $circleMessage, $circle]);
                        }

                    }
                }

                $this->Flash->success(__('サークルメッセージ作成しました。'));
                return $this->redirect(['action' => 'index', $circleMessage->circle_id]);
            }

            $this->Flash->error(__('メッセージ登録できません。解決できない場合はフィードバックよりお問い合わせください。'));
        }

        $this->set('user_id', $this->Auth->user('id'));
        $this->set(compact('circleMessage', 'from_user', 'circle_id'));
    }


    /**
     * サークルメッセージ編集
     *
     * @param string|null $id サークルメッセージID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードがない場合
     */
    public function edit($id = null)
    {
        $this->Common->referer();

        $circleMessage = $this->CircleMessages->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $circleMessage = $this->CircleMessages->patchEntity($circleMessage, $this->request->getData());
            if ($this->CircleMessages->save($circleMessage)) {

                // メール機能がONの場合
                if (SEND_MAIL_FUNCTION === 0) {
                    if ($this->request->data['notice'] === '1') {

                        // サークル検索
                        $circle = $this->CircleMessages->Circles->findById($circleMessage->circle_id)->first();

                        // 差出人ユーザー検索
                        $from_user = $this->CircleMessages->Users->findById($circleMessage->user_id)->first();

                        // メッセージ作成者がサークルオーナーではない場合オーナーにもメール通知(オーナーがメッセージ作成していない場合)
                        if ($from_user->id !== $circle->user_id) {
                            $owner = $this->CircleMessages->Users->findById($circle->user_id)->first();
                            $this->getMailer('CircleMessage')->send('circle_edit_message', [$owner, $from_user, $circleMessage, $circle]);
                        }

                        // サークルメンバーを検索
                        $this->loadModel('CircleGroups');
                        $circleGroups = $this->CircleGroups->findByCircleId($circleMessage->circle_id)->all();

                        // サークルメンバー全員にメール送信
                        foreach ($circleGroups as $circleGroup) {

                            $to_user = $this->CircleMessages->Users->findById($circleGroup->user_id)->first();
                            // メッセージ作成者はメール配信除外
                            if ($from_user->id !== $to_user->id) {
                                $this->getMailer('CircleMessage')->send('circle_edit_message', [$to_user, $from_user, $circleMessage, $circle]);
                            }

                        }

                    }
                }

                $this->Flash->success(__('メッセージ編集しました。'));
                return $this->redirect(['action' => 'index', $circleMessage->circle_id]);

            }
            $this->Flash->error(__('編集できません。解決できない場合はフィードバックよりお問い合わせください。'));
        }
        $this->set(compact('circleMessage'));
    }


    /**
     * サークルメッセージ削除
     *
     * @param string|null $id サークルメッセージID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function delete($id = null)
    {
        $this->Common->referer();
        $this->request->allowMethod(['post', 'delete']);
        $circleMessage = $this->CircleMessages->get($id);

        if ($this->CircleMessages->delete($circleMessage)) {
            $this->Flash->success(__('メッセージを削除しました。'));
        } else {
            $this->Flash->error(__('削除できません。解決できない場合はフィードバックよりお問い合わせください。'));
        }
        return $this->redirect(['action' => 'index', $circleMessage->circle_id]);
    }

}
