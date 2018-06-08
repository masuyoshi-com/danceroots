<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * 初期化メソッド
     * @return [type] [description]
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow([
            'logout', 'signup', 'complete', 'forgot',
            'midstream', 'reissue', 'passComp'
        ]);
    }


    /**
     * ログイン - 区分でリダイレクト先を変更
     *
     * @todo ログイン条件に本登録済みに限る処理追加
     */
     public function login()
     {
        $this->viewBuilder()->setLayout('simple');

        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);

                switch ($user['classification']) {
                    case 0:
                        return $this->redirect(['controller' => 'dancers', 'action' => 'home', $user['id']]);
                        break;
                    case 1:
                        return $this->redirect(['controller' => 'studios', 'action' => 'home', $user['id']]);
                        break;
                    case 2:
                        return $this->redirect(['controller' => 'organizers', 'action' => 'home', $user['id']]);
                        break;
                    case 3:
                        return $this->redirect(['controller' => 'generals', 'action' => 'home', $user['id']]);
                        break;
                    default:
                        return false;
                        break;
                };
            }
            $this->Flash->error('ユーザー名またはパスワードが不正です。');
        }
     }


     /**
      * ログアウト
      *
      * @return redirect Authコンポーネントログアウトリダイレクト先(AppController内)
      */
     public function logout()
     {
         $this->Flash->success('ログアウトしました。');
         return $this->redirect($this->Auth->logout());
     }


    /**
     * サインアップ - 仮実装はそのまま本登録する。
     * 本実装 - 仮登録としてハッシュ作成。DB登録、リンク付きURL送付処理必要
     *
     * @return \Cake\Http\Response|null
     */
     public function signup()
     {
         $this->viewBuilder()->setLayout('simple');
         $user = $this->Users->newEntity();

         if ($this->request->is('post')) {
             if ($this->request->data['agree'] === '1') {

                 $user = $this->Users->patchEntity($user, $this->request->getData());

                 if ($this->Users->save($user)) {
                     return $this->redirect(['action' => 'complete']);
                 }
             } else {
                 $this->Flash->error(__('利用規約にチェックが入っていません。'));
             }
         }
         $this->set(compact('user'));
     }


    /**
     * サインアップ完了
     */
    public function complete()
    {
        // リフェラー処理必要
        $this->viewBuilder()->setLayout('simple');
    }
    

    /**
     * マイアカウント
     *
     * @param string|null $id ユーザーID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードが存在しない場合
     *
     * @todo メール変更は有効なメールアドレスか確認するため、仮登録しておく。リンク付きメールを
     * クリックされた時点でアップデートをかける。パスワード変更のみの場合はそのままアップデートする。
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('アカウント編集しました。'));

                // 各ホーム画面へ
                return $this->redirect(['action' => '']);
            }
            $this->Flash->error(__('エラーがあります。再度確認してください。'));
        }

        $this->set(compact('user'));
    }


    /**
     * ユーザ退会処理 - 削除はしない
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     *
     * @todo delete_flagでユーザを退会させる。現状データは残しておくこと。
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * パスワード忘れた場合
     *
     */
     public function forgot()
     {
         $this->viewBuilder()->setLayout('simple');
     }


     /**
      * メール送信しました。(リンク有効期限24時間)
      *
      */
      public function midstream()
      {
          // リフェラー処理必要
          $this->viewBuilder()->setLayout('simple');
      }


    /**
     * パスワード再発行・編集
     */
    public function reissue()
    {
        // URL付きメールの一時ハッシュ値がDBでのハッシュと同じかどうか
        // ユーザがパスワードを再発行終了時点でハッシュ削除
        // または24時間以上だった場合、DBハッシュ強制削除
        $this->viewBuilder()->setLayout('simple');
    }



    /**
     * パスワード再発行完了
     */
     public function passComp()
     {
         // リフェラー処理必要
         $this->viewBuilder()->setLayout('simple');
     }
}
