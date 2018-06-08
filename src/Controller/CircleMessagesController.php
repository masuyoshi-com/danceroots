<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

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
     * @param int $circle_id サークルID
     * @return \Cake\Http\Response|void
     */
    public function index($circle_id)
    {
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

        $circle = $this->CircleMessages->Circles->get($circle_id);

        $this->set(compact('circle'));
        $this->set('circle_messages', $this->paginate($circle_messages));
    }


    /**
     * サークルメッセージ詳細
     *
     * @param int $message_id サークルメッセージID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function view($message_id)
    {
        $circle_message = $this->CircleMessages->get($message_id, [
            'contain' => ['Users']
        ]);

        // オーナー検索
        $circle_message['owner'] = $this->Common->getUsersByClassification($circle_message['user']['classification'], $circle_message->user_id);
        $profile_links = $this->Common->linkSwitch($circle_message['user']['classification'], 'view', $circle_message->user_id);

        $this->set('profile_links',  $profile_links);
        $this->set('circle_message', $circle_message);
    }


    /**
     * サークルメッセージ登録
     *
     * @param int $circle_id サークルID
     * @param int $user_id   ユーザーID
     *
     * @return \Cake\Http\Response|null
     */
    public function add($circle_id, $user_id)
    {
        $user = $this->CircleMessages->Users->findById($user_id)->first();
        $circleMessage = $this->CircleMessages->newEntity();

        if ($this->request->is('post')) {

            $circleMessage = $this->CircleMessages->patchEntity($circleMessage, $this->request->getData());

            if ($this->CircleMessages->save($circleMessage)) {

                // メール機能がONの場合
                if (SEND_MAIL_FUNCTION === 0) {
                    // サークルメンバーを検索
                    $this->loadModel('CircleGroups');
                    $circleGroups = $this->CircleGroups->findByCircleId($circleMessage->circle_id)->all();

                    // サークルメンバー全員にメール送信
                    foreach ($circleGroups as $circleGroup) {
                        $to_user = $this->CircleMessages->Users->findById($circleGroup->user_id)->first();
                        $circle  = $this->CircleMessages->Circles->findById($circleMessage->circle_id)->first();
                        $this->getMailer('CircleMessage')->send('circle_message', [$to_user, $user, $circleMessage, $circle]);
                    }
                }

                $this->Flash->success(__('サークルメッセージ登録しました。'));
                return $this->redirect(['action' => 'index', $circleMessage->circle_id]);
            }

            $this->Flash->error(__('メッセージ登録できません。解決できない場合はフィードバックよりお問い合わせください。'));
        }

        $this->set('circle_id', $circle_id);
        $this->set('user_id', $user_id);
        $this->set(compact('circleMessage', 'user'));
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
        $circleMessage = $this->CircleMessages->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $circleMessage = $this->CircleMessages->patchEntity($circleMessage, $this->request->getData());
            if ($this->CircleMessages->save($circleMessage)) {

                // メール機能がONの場合
                if (SEND_MAIL_FUNCTION === 0) {
                    if ($this->request->data['notice'] === '1') {
                        // 差出人ユーザー検索
                        $from_user = $this->CircleMessages->Users->findById($circleMessage->user_id)->first();
                        // サークルメンバーを検索
                        $this->loadModel('CircleGroups');
                        $circleGroups = $this->CircleGroups->findByCircleId($circleMessage->circle_id)->all();

                        // サークルメンバー全員にメール送信
                        foreach ($circleGroups as $circleGroup) {
                            $to_user = $this->CircleMessages->Users->findById($circleGroup->user_id)->first();
                            $circle  = $this->CircleMessages->Circles->findById($circleMessage->circle_id)->first();
                            $this->getMailer('CircleMessage')->send('circle_edit_message', [$to_user, $from_user, $circleMessage, $circle]);
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
