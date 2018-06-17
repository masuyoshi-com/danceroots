<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Dancers Controller
 *
 * @property \App\Model\Table\DancersTable $Dancers
 * @method \App\Model\Entity\Dancer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DancersController extends AppController
{
    public $search_keys = ['pref', 'genre', 'word'];

    public $paginate = [
           'limit'   => 16,
           'order'   => ['Dancers.created' => 'desc'],
           'contain' => ['Users']
     ];


    /**
     * ホーム - 初期登録時、プロフィール未作成の場合、強制的にaddアクションへ
     *
     * @param int $id ユーザーID
     * @return redirect add 初期登録の場合のみ
     *
     * @todo ダンスチーム作成しているか
     * @todo ダンスサークル作成しているか
     *
     */
    public function home($id)
    {
        if ($id) {

            $query = $this->Dancers->findByUserId($id)->contain(['Users']);
            $dancer = $query->first();

            if (!$dancer) {
                $this->Flash->default(__('最初にプロフィールを作成しましょう。'));
                $this->redirect(['action' => 'add', $id]);
            }

            $dancer['user']['classification'] = $this->Common->getCategoryName($dancer['user']['classification']);
            // メッセージ未読数取得
            $message_number = $this->Dancers->Users->Messages->findByToUserIdAndReadFlag($id, 0)->count();

            // お知らせ最新1か月以内を3件のみ取得
            $this->loadModel('Informations');
            $informations = $this->Informations->find()->where(['Informations.created >' => new \DateTime('-1 months')])->limit(3)->all();

            $this->set(compact('dancer', 'message_number', 'informations'));

        } else {
            // 強制ログアウト → 最初から操作させる
            $this->Flash->error(__('ユーザー情報を取得できません。最初からやり直してください。'));
            return $this->redirect($this->Auth->logout());
        }
    }


    /**
     * ダンサー検索一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->query) {

            // 検索クエリがなければfindBySearchで警告でないように空白状態を作成
            for ($i = 0; $i < count($this->search_keys); $i++) {
                if (!isset($this->request->query[$this->search_keys[$i]])) {
                    $this->request->query[$this->search_keys[$i]] = '';
                }
            }

            $query   = $this->Dancers->findBySearch($this->request->query);
            $dancers = $this->paginate($query);

            // 検索項目状態をセッションに格納
            $this->Session->write('dancer_search_request', $this->request->query);

        } else {
            $dancers = $this->paginate($this->Dancers);
        }

        // 検索項目状態があればリード
        if ($this->Session->check('dancer_search_request')) {
            $this->request->data = $this->Session->read('dancer_search_request');
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('dancers'));
    }


    /**
     * プロフィール詳細 - findはユーザIDで検索
     *
     * @param string $id ログインID === ユーザーID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     *
     * @todo リフェラー
     */
    public function view($id)
    {
        $query = $this->Dancers->findByUserId($id)->contain(['Users']);
        $dancer = $query->first();

        // Youtube動画IDのみを取得
        for ($i = 1; $i <= 3; $i++) {
            $dancer['youtube' . $i] = $this->Common->getYoutubeId($dancer['youtube' . $i]);
        }

        // ユーザ区分をカテゴリ名で取得
        $dancer['user']['classification'] = $this->Common->getCategoryName($dancer['user']['classification']);
        $this->set('dancer', $dancer);
    }


    /**
     * ダンサープロフィール登録 -初期登録は画面周りをシンプルに変更
     *
     * @param int $id ユーザーID
     * @return \Cake\Http\Response|null 登録成功の場合はviewへ
     *
     * @todo リフェラー
     */
    public function add($id)
    {
        $this->viewBuilder()->setLayout('add');

        // 区分ユーザーが存在し、本登録済みか
        $user = $this->Dancers->Users->findByIdAndRegisterFlagAndClassification($id, 1, 0)->first();

        if ($user) {

            // そのユーザーは既に一度プロフィール登録しているか
            $profile = $this->Dancers->findByUserId($user->id)->first();

            if (!$profile && $user->id === $this->Auth->user('id')) {
                $dancer = $this->Dancers->newEntity();

                if ($this->request->is('post')) {

                    $dancer = $this->Dancers->patchEntity($dancer, $this->request->getData());

                    if ($this->Dancers->save($dancer)) {
                        $this->Flash->success(__('プロフィール作成しました。各メニューが使用できるようになりました。'));
                        return $this->redirect(['action' => 'view', $dancer->user_id]);
                    }

                    $this->Flash->error(__('プロフィール作成できません。解決しない場合はフィードバックより報告してください。'));
                }
                $this->set('genres',  $this->Common->valueToKey($this->genres));
                $this->set('user_id', $id);
                $this->set(compact('dancer'));
            } else {
                throw new NotFoundException(__('404 不正なアクセスまたはコンテンツが見つかりません。'));
            }
        } else {
            throw new NotFoundException(__('404 不正なアクセスまたはコンテンツが見つかりません。'));
        }
    }


    /**
     * ダンサー編集
     *
     * @param string $id ユーザID
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException - レコードが存在しない場合
     *
     * @todo リフェラー
     */
    public function edit($id)
    {
        $query = $this->Dancers->findByUserId($id)->contain(['Users']);
        $dancer = $query->first();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $dancer = $this->Dancers->patchEntity($dancer, $this->request->getData());
            if ($this->Dancers->save($dancer)) {
                $this->Flash->success(__('プロフィールを更新しました。'));
                return $this->redirect(['action' => 'view', $dancer->user_id]);
            }
            $this->Flash->error(__('エラーがあります。解決しない場合はフィードバックより報告してください。'));
        }

        $videos = [];
        for ($i = 1; $i <= 3; $i++) {
            $videos[] = $this->Common->getYoutubeId($dancer['youtube' . $i]);
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('dancer', 'videos'));
    }


    /**
     * Delete method - 管理用
     *
     * @param string|null $id Dancer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     *
     * @todo 後にフラグか実際に消すか判断
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dancer = $this->Dancers->get($id);
        if ($this->Dancers->delete($dancer)) {
            $this->Flash->success(__('The dancer has been deleted.'));
        } else {
            $this->Flash->error(__('The dancer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
