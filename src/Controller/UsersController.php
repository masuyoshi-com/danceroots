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
            'bin/cake acl grant Groups.1 controllers/Users/emailEdit',
            'bin/cake acl grant Groups.1 controllers/DanceMusics',
            'bin/cake acl grant Groups.1 controllers/RecommendMusics',
            'bin/cake acl grant Groups.1 controllers/RecommendVideos',
            'bin/cake acl grant Groups.1 controllers/StudioSchedules/index',

            'bin/cake acl grant Groups.1 controllers/Legends',

            // Studios
            'bin/cake acl deny Groups.2 controllers',
            'bin/cake acl grant Groups.2 controllers/Studios',
            'bin/cake acl grant Groups.2 controllers/Circles',
            'bin/cake acl grant Groups.2 controllers/CircleGroups',
            'bin/cake acl grant Groups.2 controllers/CircleMessages',
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
            'bin/cake acl grant Groups.2 controllers/Users/emailEdit',
            'bin/cake acl grant Groups.2 controllers/DanceMusics',
            'bin/cake acl grant Groups.2 controllers/RecommendMusics',
            'bin/cake acl grant Groups.2 controllers/RecommendVideos',
            'bin/cake acl grant Groups.2 controllers/StudioSchedules',

            'bin/cake acl grant Groups.2 controllers/Legends',

            // Organizers
            'bin/cake acl deny Groups.3 controllers',
            'bin/cake acl grant Groups.3 controllers/Organizers',
            'bin/cake acl grant Groups.3 controllers/Circles',
            'bin/cake acl grant Groups.3 controllers/CircleGroups',
            'bin/cake acl grant Groups.3 controllers/CircleMessages',
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
            'bin/cake acl grant Groups.3 controllers/Users/emailEdit',
            'bin/cake acl grant Groups.3 controllers/DanceMusics',
            'bin/cake acl grant Groups.3 controllers/RecommendMusics',
            'bin/cake acl grant Groups.3 controllers/RecommendVideos',
            'bin/cake acl grant Groups.3 controllers/StudioSchedules/index',

            'bin/cake acl grant Groups.3 controllers/Legends',

            // Generals
            'bin/cake acl deny Groups.4 controllers',
            'bin/cake acl grant Groups.4 controllers/Generals',
            'bin/cake acl grant Groups.4 controllers/Circles',
            'bin/cake acl grant Groups.4 controllers/CircleGroups',
            'bin/cake acl grant Groups.4 controllers/CircleMessages',
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
            'bin/cake acl grant Groups.4 controllers/Users/emailEdit',
            'bin/cake acl grant Groups.4 controllers/DanceMusics',
            'bin/cake acl grant Groups.4 controllers/RecommendMusics',
            'bin/cake acl grant Groups.4 controllers/RecommendVideos',
            'bin/cake acl grant Groups.4 controllers/StudioSchedules/index',

            'bin/cake acl grant Groups.4 controllers/Legends',

            // linux環境はbin/cakeをchmod +x bin/cakeしておく
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
                            return $this->redirect(['controller' => 'dancers', 'action' => 'home']);
                            break;
                        case 1:
                            return $this->redirect(['controller' => 'studios', 'action' => 'home']);
                            break;
                        case 2:
                            return $this->redirect(['controller' => 'organizers', 'action' => 'home']);
                            break;
                        case 3:
                            return $this->redirect(['controller' => 'generals', 'action' => 'home']);
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

                 // メールが有効でない場合は仮登録メール配信の例外で処理止める
                 $this->getMailer('User')->send('user_regist', [$user]);

                 if ($this->Users->save($user)) {
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
                    // 48時間以上の放置はユーザーを強制削除
                    $this->Users->delete($user);
                    return $this->redirect(['action' => 'error']);
                }

                // register_flagを1にアップデート
                $user->register_flag = 1;
                // tmp_hashは別の認証でも使用するためnullにしておく
                $user->tmp_hash = null;
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
     * fieldListを使用して3つの処理に分ける。ユーザー名変更処理、メール変更処理、パスワード変更処理
     *
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException レコードが存在しない場合
     */
    public function edit()
    {
        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is(['patch', 'post', 'put'])) {

            // エラーカウント初期化
            $error = 0;

            // パスワード変更処理
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

                                $user = $this->Users->patchEntity($user, $this->request->getData(), ['fieldList' => ['password']]);

                                if ($this->Users->save($user)) {
                                    // パスワード変更メール送信
                                    if (SEND_MAIL_FUNCTION === 0) {
                                        // 差出人ユーザー取得
                                        $this->getMailer('User')->send('user_pass_edit', [$user]);
                                    }
                                } else {
                                    $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックより報告してください。'));
                                    $error++;
                                }
                            } else {
                                $this->Flash->error(__('新たなパスワードが確認と一致しません。'));
                                $error++;
                            }
                        } else {
                            $this->Flash->error(__('現在のパスワードの認証は完了しましたが、新たなパスワードが見つかりません。'));
                            $error++;
                        }
                    } else {
                        $this->Flash->error(__('現在のパスワードが認証できません。'));
                        $error++;
                    }
                } else {
                    throw new NotFoundException(__('404 不正なアクセスまたはユーザーが見つかりません。'));
                }
            }

            // メール変更処理(tmp_mailで仮登録) 有効認証するためハッシュリンク付きメール送信
            if ($this->request->data['email'] !== $user->email) {

                $this->request->data['tmp_email'] = $this->request->data['email'];
                // tmp_hash 仮登録ハッシュ生成
                $this->request->data['tmp_hash'] = md5(uniqid(rand(), 1));
                // 手動でEmailがユニークか調べる
                $mail_count = $this->Users->findByEmail($this->request->data['email'])->count();

                if ($mail_count === 0) {
                    $user = $this->Users->patchEntity($user, $this->request->getData(), ['fieldList' => ['tmp_email', 'tmp_hash']]);
                    // 一時認証メールを登録
                    if ($this->Users->save($user)) {
                        if (SEND_MAIL_FUNCTION === 0) {
                            $this->getMailer('User')->send('user_email_edit', [$user]);
                        }
                    } else {
                        $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックより報告してください。'));
                        $error++;
                    }
                } else {
                    $this->Flash->error(__('既に使用されているメールアドレスです。'));
                    $error++;
                }
            }

            // パスワード変更と、メール変更に問題がなければユーザ名変更を実行後Success
            if ($error === 0) {
                // ユーザー名処理
                $user = $this->Users->patchEntity($user, $this->request->getData(), ['fieldList' => ['username']]);

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('アカウント編集しました。メールアドレス変更の場合は送付メールで手続きをしてください。'));
                    // ホームへ
                    $homes = $this->Common->linkSwitch($user->classification, 'home', $user->id);
                    return $this->redirect($homes);
                }
            }
        }
        $this->set(compact('user'));
    }


    /**
     * メール編集
     *
     * @return redirect ユーザーが存在しない、保存できない場合はエラー画面へ
     * @throws \Cake\Network\Exception\NotFoundException
     */
     public function emailEdit()
     {
         $this->viewBuilder()->setLayout('simple');

         if ($this->request->query) {

             // 送られてきたハッシュが存在するか
             $user = $this->Users->findByTmpHash($this->request->query['e'])->first();

             if ($user) {

                 // 重複アクセスを避けるため一時ハッシュはnullにしておく
                 $user->tmp_hash  = null;
                 $user->email     = $user->tmp_email;
                 $user->tmp_email = null;

                 if ($this->Users->save($user)) {
                     // メール変更後、ログインなどのセッションを一旦破棄(新たなメールでログインしてもらうため)
                     $this->Session->destroy();
                 } else {
                     return $this->redirect(['action' => 'error']);
                 }
             } else {
                 return $this->redirect(['action' => 'error']);
             }
         } else {
             throw new NotFoundException(__('404 不正なアクセスまたはページが見つかりません。'));
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
                    // 重複アクセスを避けるため一時ハッシュはnullにしておく
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
