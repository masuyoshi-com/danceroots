<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use Cake\Network\Exception\NotFoundException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    use MailerAwareTrait;

    /**
     * 初期化メソッド
     * @return [type] [description]
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow([
            'logout',     'signup',  'complete', 'forgot',
            'midstream',  'reissue', 'passComp', 'error',
            'registered', 'forgotMail',
        ]);
    }

    /**
     * ACLコマンド - どのグループをアクセス制限しているのか残すためにおいておく。
     * コマンドライン上で実行する
     */
    private function initDB()
    {
        [
            // Dancers
            'bin/cake acl deny Groups.1 controllers',
            'bin/cake acl grant Groups.1 controllers/Dancers',
            'bin/cake acl grant Groups.1 controllers/Circles',
            'bin/cake acl grant Groups.1 controllers/CircleGroups',
            'bin/cake acl grant Groups.1 controllers/CircleMessages',
            'bin/cake acl grant Groups.1 controllers/DanceVideos',
            'bin/cake acl grant Groups.1 controllers/Events',
            'bin/cake acl grant Groups.1 controllers/Feedbacks',
            'bin/cake acl grant Groups.1 controllers/Generals/view',
            'bin/cake acl grant Groups.1 controllers/Informations',
            'bin/cake acl grant Groups.1 controllers/Jobs/index',
            'bin/cake acl grant Groups.1 controllers/Jobs/view',
            'bin/cake acl grant Groups.1 controllers/Messages',
            'bin/cake acl grant Groups.1 controllers/Organizers/view',
            'bin/cake acl grant Groups.1 controllers/Studios/index',
            'bin/cake acl grant Groups.1 controllers/Studios/view',
            'bin/cake acl grant Groups.1 controllers/Users/edit',

            // Studios
            'bin/cake acl deny Groups.2 controllers',
            'bin/cake acl grant Groups.2 controllers/Studios',
            'bin/cake acl grant Groups.2 controllers/Circles/index',
            'bin/cake acl grant Groups.2 controllers/Circles/view',
            'bin/cake acl grant Groups.2 controllers/Dancers/index',
            'bin/cake acl grant Groups.2 controllers/Dancers/view',
            'bin/cake acl grant Groups.2 controllers/DanceVideos',
            'bin/cake acl grant Groups.2 controllers/Events',
            'bin/cake acl grant Groups.2 controllers/Feedbacks',
            'bin/cake acl grant Groups.2 controllers/Generals/view',
            'bin/cake acl grant Groups.2 controllers/Informations',
            'bin/cake acl grant Groups.2 controllers/Jobs',
            'bin/cake acl grant Groups.2 controllers/Messages',
            'bin/cake acl grant Groups.2 controllers/Organizers/view',
            'bin/cake acl grant Groups.2 controllers/Users/edit',

            // Organizers
            'bin/cake acl deny Groups.3 controllers',
            'bin/cake acl grant Groups.3 controllers/Organizers',
            'bin/cake acl grant Groups.3 controllers/Circles/index',
            'bin/cake acl grant Groups.3 controllers/Circles/view',
            'bin/cake acl grant Groups.3 controllers/Dancers/index',
            'bin/cake acl grant Groups.3 controllers/Dancers/view',
            'bin/cake acl grant Groups.3 controllers/DanceVideos',
            'bin/cake acl grant Groups.3 controllers/Events',
            'bin/cake acl grant Groups.3 controllers/Feedbacks',
            'bin/cake acl grant Groups.3 controllers/Generals/view',
            'bin/cake acl grant Groups.3 controllers/Informations',
            'bin/cake acl grant Groups.3 controllers/Jobs',
            'bin/cake acl grant Groups.3 controllers/Messages',
            'bin/cake acl grant Groups.3 controllers/Studios/index',
            'bin/cake acl grant Groups.3 controllers/Studios/view',
            'bin/cake acl grant Groups.3 controllers/Users/edit',

            // Generals
            'bin/cake acl deny Groups.4 controllers',
            'bin/cake acl grant Groups.4 controllers/Generals',
            'bin/cake acl grant Groups.4 controllers/Circles/index',
            'bin/cake acl grant Groups.4 controllers/Circles/view',
            'bin/cake acl grant Groups.4 controllers/Dancers/index',
            'bin/cake acl grant Groups.4 controllers/Dancers/view',
            'bin/cake acl grant Groups.4 controllers/DanceVideos',
            'bin/cake acl grant Groups.4 controllers/Events',
            'bin/cake acl grant Groups.4 controllers/Feedbacks',
            'bin/cake acl grant Groups.4 controllers/Informations',
            'bin/cake acl grant Groups.4 controllers/Jobs/index',
            'bin/cake acl grant Groups.4 controllers/Jobs/view',
            'bin/cake acl grant Groups.4 controllers/Messages',
            'bin/cake acl grant Groups.4 controllers/Organizers/view',
            'bin/cake acl grant Groups.4 controllers/Studios/index',
            'bin/cake acl grant Groups.4 controllers/Studios/view',
            'bin/cake acl grant Groups.4 controllers/Users/edit',

            // Controller追加，Groupの変更などで更新する場合
            'bin/cake acl_extras aco_update',

            // その後に各区分に上記コマンドで設定
        ];
    }


    /**
     * ログイン - 区分でリダイレクト先を変更
     */
     public function login()
     {
        $this->viewBuilder()->setLayout('simple');

        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            if ($user) {
                // 本登録が完了しているか
                if ($user['register_flag'] === 1) {
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
                $this->Flash->error('本登録が完了していません。有効期限が過ぎている場合はお問い合わせください。');
            } else {
                $this->Flash->error('ユーザー名またはパスワードが不正です。');
            }
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
     * サインアップ
     * ACLのGroupIdでは1から区分カウントとする。注意
     *
     * @return \Cake\Http\Response|null
     */
     public function signup()
     {
         $this->viewBuilder()->setLayout('simple');
         $user = $this->Users->newEntity();

         if ($this->request->is('post')) {
             if ($this->request->data['agree'] === '1') {

                 // tmp_hash 仮登録ハッシュ生成
                 $this->request->data['tmp_hash'] = md5(uniqid(rand(), 1));

                 // ACLグループIDは原則classification + 1 のIDとする GroupsテーブルデータIDを参照
                 $this->request->data['group_id'] = $this->request->data['classification'] + 1;

                 $user = $this->Users->patchEntity($user, $this->request->getData());

                 if ($this->Users->save($user)) {
                     // 仮登録メール配信
                     $this->getMailer('User')->send('user_regist', [$user]);
                     return $this->redirect(['action' => 'midstream']);
                 }
             } else {
                 $this->Flash->error(__('利用規約にチェックが入っていません。'));
             }
         }
         $this->set(compact('user'));
     }


    /**
     * サインアップ完了
     *
     * @return redirect URL手入力はNotFountException、クエリが存在する場合はエラーページ
     * すでに本登録されている場合はregistered。48時間以上もエラー
     */
    public function complete()
    {
        $this->viewBuilder()->setLayout('simple');

        if ($this->request->query) {
            // 送られてきたハッシュが存在するか
            $user = $this->Users->findByTmpHash($this->request->query['u'])->first();

            if ($user) {
                // すでに本登録済みの場合
                if ($user->register_flag === 1) {
                    return $this->redirect(['action' => 'registered']);
                }

                // ユーザ仮登録(created)は48時間以内に登録されたものか
                if (!$user->created->wasWithinLast(2)) {
                    return $this->redirect(['action' => 'error']);
                }

                // register_flagを1にアップデート
                $user->register_flag = 1;
                $this->Users->save($user);

            } else {
                return $this->redirect(['action' => 'error']);
            }
        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
        }

    }


    /**
     * マイアカウント
     * パスワード変更はなりすましの可能性もあるため、完了後にメールを送る。心当たりがない場合は問い合わせを促すため
     *
     * @param string|null $id ユーザーID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードが存在しない場合
     *
     * @todo 現状メールアドレス変更は問い合わせ後、運用がメール確認をとる。確認後、メールアドレスを運用が更新する
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            if ($this->request->data['current_password']) {

                $user = $this->Users->findById($this->request->data['id'])->first();

                if ($user) {
                    // 現在のパスワードを認証
                    if (password_verify($this->request->data['current_password'], $user->password)) {
                        // 新たなパスワードがある場合
                        if ($this->request->data['new_password']) {
                            // 新たなパスワードと確認パスワードが一致するか
                            if ($this->request->data['new_password'] === $this->request->data['confirm_password']) {

                                $this->request->data['password'] = $this->request->data['new_password'];

                                unset($this->request->data['new_password']);
                                unset($this->request->data['confirm_password']);

                                $user = $this->Users->patchEntity($user, $this->request->getData());

                                if ($this->Users->save($user)) {
                                    // パスワード変更メール送信
                                    if (SEND_MAIL_FUNCTION === 0) {
                                        // 差出人ユーザー取得
                                        $this->getMailer('User')->send('user_pass_edit', [$user]);
                                    }
                                    $this->Flash->success(__('アカウント編集しました。パスワード変更完了のメールが送信されました。'));
                                    // ホームへ
                                    $homes = $this->Common->linkSwitch($user->classification, 'home', $user->id);
                                    return $this->redirect($homes);
                                }
                                $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックより報告してください。'));

                            } else {
                                $this->Flash->error(__('新たなパスワードが確認と一致しません。'));
                            }
                        } else {
                            $this->Flash->error(__('現在のパスワードの認証は完了しましたが、新たなパスワードが見つかりません。'));
                        }
                    } else {
                        $this->Flash->error(__('現在のパスワードが認証できません。'));
                    }

                } else {
                    throw new NotFoundException(__('404 不正なアクセスまたはユーザーが見つかりません。'));
                }

            } else {
                $user = $this->Users->patchEntity($user, $this->request->getData());

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('アカウント編集しました。'));

                    // ホームへ
                    $homes = $this->Common->linkSwitch($user->classification, 'home', $user->id);
                    return $this->redirect($homes);
                }
                $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックより報告してください。'));
            }
        }

        // 取得したユーザーが現在ログインしているユーザIDと同じか
        if ($user->id === $this->Auth->user('id')) {
            $this->set(compact('user'));
        } else {
            throw new NotFoundException(__('404 ページが見つかりません。'));
        }

    }


    /**
     * 本登録リンク切れ、不正エラー
     */
     public function error()
     {
         $this->viewBuilder()->setLayout('simple');
     }


     /**
      * 本登録案内メールお知らせ
      *
      */
      public function midstream()
      {
          $this->Common->referer();
          $this->viewBuilder()->setLayout('simple');
      }


     /**
      * 本登録済み
      *
      */
      public function registered()
      {
          $this->Common->referer();
          $this->viewBuilder()->setLayout('simple');
      }


    /**
     * パスワード忘れた場合
     */
     public function forgot()
     {
         $this->viewBuilder()->setLayout('simple');

         if ($this->request->is('post')) {

             $user = $this->Users->findByEmail($this->request->data['email'])->first();
             unset($this->request->data['email']);

             if ($user) {
                 // 本登録を済ませているユーザーのみ受付
                 if ($user->register_flag === 1) {

                     $this->request->data['tmp_hash'] = md5(uniqid(rand(), 1));
                     $user = $this->Users->patchEntity($user, $this->request->getData());

                     // ハッシュのみ保存
                     if ($this->Users->save($user)) {
                        // メール送信
                        $this->getMailer('User')->send('user_pass_forgot', [$user]);
                        return $this->redirect(['action' => 'forgotMail']);
                     }

                 } else {
                     $this->Flash->error(__('本登録を済ませているユーザーではありません。先に本登録をしてください。'));
                 }
             } else {
                 $this->Flash->error(__('存在しないユーザーです。'));
             }
         }
     }


     /**
      * パスワードを忘れたメール送信完了画面
      */
     public function forgotMail()
     {
         $this->Common->referer();
         $this->viewBuilder()->setLayout('simple');
     }


    /**
     * パスワード再発行・編集
     *
     * @return redirect 一時ハッシュが存在しない場合、48時間以上のアクセスはエラー画面へ
     *  URL手入力はトップページへ
     */
    public function reissue()
    {
        $this->viewBuilder()->setLayout('simple');

        if ($this->request->query) {
            // 送られてきたハッシュが存在するか
            $user = $this->Users->findByTmpHash($this->request->query['p'])->first();

            if ($user) {

                // パスワード再発行の際、Eメール入力日時(modified)は48時間以内に登録されたものか
                if (!$user->modified->wasWithinLast(2)) {
                    // 48時間以上なら一時ハッシュはnullにしておく
                    $user->tmp_hash = null;
                    $this->Users->save($user);
                    return $this->redirect(['action' => 'error']);
                }

            } else {
                return $this->redirect(['action' => 'error']);
            }
        } else {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }

        // パスワード再発行リクエスト
        if ($this->request->is('post')) {
            // パスワード確認が同じか
            if ($this->request->data['password'] === $this->request->data['confirm']) {

                // 同じ場合はconfirmは不要
                unset($this->request->data['confirm']);
                // 繰り返し登録はさせないため、ハッシュ削除
                $this->request->data['tmp_hash'] = null;

                $user = $this->Users->patchEntity($user, $this->request->getData());

                if ($this->Users->save($user)) {
                    return $this->redirect(['action' => 'passComp']);
                }
                $this->Flash->error(__('パスワード再発行できません。解決しない場合はお問い合わせください。'));
            } else {
                $this->Flash->error(__('パスワード確認が一致しません。もう一度入力してください。'));
            }
        }
    }


    /**
     * パスワード再発行完了
     */
     public function passComp()
     {
         $this->Common->referer();
         $this->viewBuilder()->setLayout('simple');
     }

}
