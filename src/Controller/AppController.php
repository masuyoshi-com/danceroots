<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;

/**
 * Application Controller
 */
class AppController extends Controller
{
    // 汎用項目ジャンル
    public $genres = [
        'HipHop', 'R&B', 'House', 'Lock', 'Pop', 'Break', 'OldSchool', 'FreeStyle',
        'GirlsHipHop', 'Jazz', 'Kids', 'BeBop', 'Reggae', 'Berry', 'Salsa', 'Tap', 'ETC',
    ];

    /**
     * 初期化処理
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Acl.Acl');
        /**
         * AUTH認証
         * ログインリダイレクトは条件分岐で区分により各ホーム画面へ切り替え
         */
        $this->loadComponent('Auth', [
            'authorize'    => ['Acl.Actions' => ['actionPath' => 'controllers/']],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action'     => 'login'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action'     => 'login'
            ],
            'authError' => 'ログインしてください。',
            // 未認証の場合、直前のページに戻します
            'unauthorizedRedirect' => $this->referer()
        ]);

        $this->loadComponent('Security');
        $this->loadComponent('Csrf');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Mail');
        $this->loadComponent('Common');

        // アクセスしやすいようにローカル変数に格納
        $this->Session = $this->request->session();
    }


    /**
     * コントローラーの各アクションの前に発動する Controller.initialize イベント中に呼ぶ
     *
     * @param Event $event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        // ログインユーザー情報とユーザー区分でリンク先を動的変更
        if (!is_null($this->Auth->user())) {

            // ログイン後、認可エラーをログインエラーと同じにしないためにautherrorはfalseにしておく
            $this->Auth->config('authError', false);

            $logins = $this->Auth->user();

            $homes  = $this->Common->linkSwitch($logins['classification'], 'home');
            $views  = $this->Common->linkSwitch($logins['classification'], 'view', $logins['username']);

            $this->set('homes', $homes);
            $this->set('views', $views);
            $this->set('logins', $logins);
        }

        // 都道府県配列
        $this->loadModel('Prefectures');
        $results = $this->Prefectures->find();
        $prefs = [];
        foreach ($results as $row) {
            $prefs[$row->prefecture] = $row->prefecture;
        }
        $this->set('prefs', $prefs);

        // 読み込みファイル制御のためURLを常にセット
        $this->set('url', Router::url());
    }


    /**
     * ACLアクセス制御
     *
     * @param array $user ログインユーザー情報
     * @return object ACLチェック
     */
    public function isAuthorized($user)
    {
        $Collection = new ComponentRegistry();
        $acl        = new AclComponent($Collection);
        $controller = $this->request->controller;
        $action     = $this->request->action;
        return $acl->check(['Users' => ['id' => $user['id']]], "$controller/$action");
    }


}
