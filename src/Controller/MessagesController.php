<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

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
     * メッセージ受信箱 送られてきたのでToとする
     *
     * @param int $id ユーザーID
     * @return \Cake\Http\Response|void
     */
    public function index($id)
    {
        // 受信箱データ
        $to_query    = $this->Messages->findAllByToUserIdAndToDelFlag($id, 0);
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
     *
     * @param int $id ユーザーID
     * @return \Cake\Http\Response|void
     */
    public function outbox($id)
    {
        // 送信箱データ
        $from_query    = $this->Messages->findAllByUserIdAndFromDelFlag($id, 0);
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
     *
     * @todo リフェラー処理
     */
    public function view($id = null)
    {
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
     * @param int $from_id  差出人ユーザーID
     * @param int $to_id    送信先ユーザーID
     * @param int $reply_id 基のメッセージID
     *
     * @return \Cake\Http\Response|null
     *
     * @todo メッセージ作成後、送信相手にメールお知らせメッセージを送る
     * @todo url手入力禁止
     */
    public function add($from_id, $to_id, $reply_id = null)
    {
        // 送信先ユーザー取得
        $to_user = $this->Messages->Users->findById($to_id)->first();
        $message = $this->Messages->newEntity();

        if ($this->request->is('post')) {

            // 返信の場合はどのメッセージに対してかわかるようにメッセージIDを登録
            if ($reply_id) {
                $this->request->data['reply_id']   = $reply_id;

                // 親(基)となるメッセージのrepley_flagを更新
                $parent_message = $this->Messages->get($reply_id);
                // メッセージが未読の場合、既読フラグアップデート
                if ($parent_message->reply_flag === 0) {
                    $parent_message->reply_flag = 1;
                    $this->Messages->save($parent_message);
                }
            }

            $message = $this->Messages->patchEntity($message, $this->request->getData());

            if ($this->Messages->save($message)) {

                // メール機能がONの場合
                if (SEND_MAIL_FUNCTION === 0) {
                    // 差出人ユーザー取得
                    $from_user = $this->Messages->Users->findById($this->request->data['user_id'])->first();
                    $this->getMailer('Message')->send('message', [$to_user, $from_user, $message]);
                }

                $this->Flash->success(__($this->request->data['to_user'] . 'さんにメッセージ送信しました。'));
                return $this->redirect($this->request->data['url']);
            }

            $this->Flash->error(__('送信できません。再度確認してください。'));
        }

        if ($this->referer() !== '/') {
            // GETで送信
            $url = $this->referer();
        } else {
            // 不正なアクセス処理記述
            $url = null;
        }

        $this->set('url',        $url);
        $this->set('user_id',    $from_id);
        $this->set('to_user_id', $to_id);
        $this->set(compact('message', 'to_user'));
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
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        $message->to_del_flag = 1;

        if ($this->Messages->save($message)) {
            $this->Flash->success(__('メッセージを削除しました。'));
        } else {
            $this->Flash->error(__('削除できません。解決しない場合はフィードバックより受け付けています。'));
        }

        return $this->redirect(['action' => 'index', $message->to_user_id]);
    }


    /**
     * 送信メッセージ削除 - 削除はフラグを変更するのみ
     *
     * @param string|null $id メッセージID
     * @return \Cake\Http\Response|null indexリダイレクト
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードがない場合
     */
    public function fromDelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        $message->from_del_flag = 1;

        if ($this->Messages->save($message)) {
            $this->Flash->success(__('メッセージを削除しました。'));
        } else {
            $this->Flash->error(__('削除できません。解決しない場合はフィードバックより受け付けています。'));
        }

        return $this->redirect(['action' => 'outbox', $message->user_id]);
    }
}
