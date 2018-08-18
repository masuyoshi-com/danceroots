<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;
use Cake\Network\Exception\NotFoundException;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 * @method \App\Model\Entity\Message[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessagesController extends AppController
{
    use MailerAwareTrait;

    public $paginate = [
           'limit' => 20,
           'order' => ['Messages.created' => 'desc']
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

         $this->Security->config('unlockedActions', ['add']);

         // 特定のアクションのみCSRF無効化
         if (in_array($this->request->action, ['add'])) {
             $this->eventManager()->off($this->Csrf);
         }
     }


    /**
     * メッセージ受信箱 送られてきたのでToとする
     */
    public function index()
    {
        // 受信箱データ
        $to_query    = $this->Messages->findAllByToUserIdAndToDelFlag($this->Auth->user('id'), 0);
        $to_messages = $this->paginate($to_query)->toArray();

        // Fromユーザ取得
        if ($to_messages) {
            $j = 0;
            foreach ($to_messages as $to) {
                $to_messages[$j]['from_username'] = $this->Messages->Users
                    ->findById($to->user_id)
                    ->select(['Users.id', 'Users.username'])->toArray();
                $j++;
            }
        }

        $this->set('to_messages',   $to_messages);
    }


    /**
     * 送信箱 差出人になったのでFromとする
     */
    public function outbox()
    {
        // 送信箱データ
        $from_query    = $this->Messages->findAllByUserIdAndFromDelFlag($this->Auth->user('id'), 0);
        $from_messages = $this->paginate($from_query)->toArray();

        // Toユーザー取得
        if ($from_messages) {
            $i = 0;
            foreach ($from_messages as $from) {
                $from_messages[$i]['to_username'] = $this->Messages->Users
                    ->findById($from->to_user_id)
                    ->select(['Users.id', 'Users.username'])->toArray();
                $i++;
            }
        }
        $this->set('from_messages', $from_messages);
    }


    /**
     * 受信メッセージ詳細
     *
     * @param string|null $id メッセージID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function view($id = null)
    {
        $this->Common->referer();

        $message = $this->Messages->get($id, ['contain' => ['Users']]);
        // メッセージが未読の場合、既読フラグアップデート
        if ($message->read_flag === 0) {
            $message->read_flag = 1;
            $this->Messages->save($message);
        }

        // メッセージ差出人プロフィール検索
        $message['profile'] = $this->Common->getUsersByClassification($message['user']['classification'], $message->user_id);
        $message['link']    = $this->Common->linkSwitch($message['user']['classification'], 'view', $message->user_id);

        $this->set('message', $message);
        // メッセージ用変数
        $this->set('message_id',  $message->id);
        $this->set('to_user_id',  $message->user_id);
        $this->set('to_username', $message->user->username);
    }


    /**
     * 送信済みメッセージ詳細
     *
     * @param string|null $id メッセージID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
     public function outView($id = null)
     {
         $this->Common->referer();

         $message = $this->Messages->get($id);
         // 相手ユーザ名を取得
         $message['to_username'] = $this->Messages->Users->findById($message->to_user_id)
            ->select(['Users.id', 'Users.username'])
            ->toArray();

         $this->set('message', $message);
     }


    /**
     * メッセージ作成
     *
     * @param string|null $this->request->data['to_user_id']  送信先ユーザーID
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $this->Common->referer();
        $this->autoRender = false;

        if ($this->request->is('ajax')) {

            $message = $this->Messages->newEntity();

            // 返信の場合はどのメッセージに対してかわかるようにメッセージIDを登録
            if (isset($this->request->data['message_id'])) {
                // 親(基)となるメッセージのrepley_flagを更新
                $parent_message = $this->Messages->get($this->request->data['message_id']);
                // メッセージが未読の場合、既読フラグアップデート
                if ($parent_message->reply_flag === 0) {
                    $parent_message->reply_flag = 1;
                    $this->Messages->save($parent_message);
                }
            }
            
            // 差出人user_idをセット
            $this->request->data['user_id'] = $this->Auth->user('id');
            $message = $this->Messages->patchEntity($message, $this->request->getData(), ['validate' => false]);

            if ($this->Messages->save($message)) {

                // メール機能がONの場合
                if (SEND_MAIL_FUNCTION === 0) {
                    // 送信先ユーザー取得
                    $to_user = $this->Messages->Users->findById($this->request->data['to_user_id'])->first();
                    // 差出人ユーザー取得
                    $from_user = $this->Messages->Users->findById($this->Auth->user('id'))->first();
                    $this->getMailer('Message')->send('message', [$to_user, $from_user, $message]);
                }
                $this->response->body(json_encode($this->request->data));
                return $this->response;
            }
            return false;
        }
    }


    /**
     * 受信メッセージ削除 - 削除はフラグを変更するのみ
     * 自分に送られてきた(To)に値するのでFromと混同しないこと
     *
     * @param string|null $id メッセージID
     * @return \Cake\Http\Response|null indexリダイレクト
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function toDelete($id = null)
    {
        $this->Common->referer();

        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        $message->to_del_flag = 1;

        if ($this->Messages->save($message)) {
            $this->Flash->success(__('メッセージを削除しました。'));
        } else {
            $this->Flash->error(__('削除できません。解決しない場合はフィードバックよりお問い合わせください。'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * 送信メッセージ削除 - 削除はフラグを変更するのみ
     *
     * @param string|null $id メッセージID
     * @return \Cake\Http\Response|null outboxへリダイレクト
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function fromDelete($id = null)
    {
        $this->Common->referer();

        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        $message->from_del_flag = 1;

        if ($this->Messages->save($message)) {
            $this->Flash->success(__('メッセージを削除しました。'));
        } else {
            $this->Flash->error(__('削除できません。解決しない場合はフィードバックよりお問い合わせください。'));
        }

        return $this->redirect(['action' => 'outbox']);
    }
}
