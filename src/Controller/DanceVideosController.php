<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DanceVideos Controller
 *
 * @property \App\Model\Table\DanceVideosTable $DanceVideos
 */
class DanceVideosController extends AppController
{
    public $search_keys = ['genre', 'word'];

    public $paginate = [
        'limit'   => 16,
        'order'   => ['DanceVideos.created' => 'desc'],
        'contain' => ['Users']
    ];


    /**
     * マイYoutube動画一覧
     * ※ オブジェクト箇所を任意に要素追加する場合はページネート時にtoArray()で一旦配列として処理する
     *
     * @param $id ユーザーID
     */
    public function list($id)
    {
        $query  = $this->DanceVideos->findByUserId($id);
        $videos = $this->paginate($query)->toArray();

        if ($videos) {
            for ($i = 0; $i < count($videos); $i++) {
                $videos[$i]['youtube'] = $this->Common->getYoutubeId($videos[$i]['youtube']);
            }

            // ユーザー区分プロフィール取得(ICON使用目的)
            $profiles = $this->Common->getUsersByClassification($videos[0]['user']['classification'], $videos[0]['user']['id']);
            $this->set('icon', $profiles->icon);
        }

        $this->set('id', $id);
        $this->set('videos', $videos);
        $this->set('genres', $this->Common->valueToKey($this->genres));
    }


    /**
     * ダンス動画検索
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->query) {

            for ($i = 0; $i < count($this->search_keys); $i++) {
                if (!isset($this->request->query[$this->search_keys[$i]])) {
                    $this->request->query[$this->search_keys[$i]] = '';
                }
            }

            $query  = $this->DanceVideos->findBySearch($this->request->query);
            $videos = $this->paginate($query)->toArray();

            $this->Session->write('video_search_request', $this->request->query);

        } else {
            $videos = $this->paginate($this->DanceVideos)->toArray();
        }

        if ($this->Session->check('video_search_request')) {
            $this->request->data = $this->Session->read('video_search_request');
        }

        // 登録者区分プロフィールを取得 / YoutubeIDのみに変更 / 区分リンク取得
        if ($videos) {
            for ($i = 0; $i < count($videos); $i++) {
                $videos[$i]['profile'] = $this->Common->getUsersByClassification($videos[$i]['user']['classification'], $videos[$i]['user']['id']);
                $videos[$i]['youtube'] = $this->Common->getYoutubeId($videos[$i]['youtube']);
                $videos[$i]['link']    = $this->Common->linkSwitch($videos[$i]['user']['classification'], 'view', $videos[$i]['user']['id']);
            }
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('videos'));
    }


    /**
     * ダンス動画共有登録
     *
     * @param int $id ユーザーID
     * @return \Cake\Http\Response|null
     */
    public function add($id)
    {
        $danceVideo = $this->DanceVideos->newEntity();

        if ($this->request->is('post')) {

            $danceVideo = $this->DanceVideos->patchEntity($danceVideo, $this->request->getData());

            if ($this->DanceVideos->save($danceVideo)) {

                $this->Flash->success(__('ダンス動画を登録しました。'));
                return $this->redirect(['action' => 'list', $id]);
            }
            $this->Flash->error(__('エラーがありました。再度確認してください。'));
        }

        $this->set('user_id', $id);
        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('danceVideo'));
    }


    /**
     * ダンス動画編集
     *
     * @param int $id ダンス動画ID
     * @return \Cake\Http\Response|null
     */
    public function edit($id)
    {
        $danceVideo = $this->DanceVideos->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $danceVideo = $this->DanceVideos->patchEntity($danceVideo, $this->request->getData());

            if ($this->DanceVideos->save($danceVideo)) {

                $this->Flash->success(__('ダンス動画を編集しました。'));
                return $this->redirect(['action' => 'list', $danceVideo->user_id]);
            }
            $this->Flash->error(__('エラーがありました。再度確認してください。'));
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('danceVideo'));
    }


    /**
     * ダンス動画共有削除
     *
     * @param string $id      ダンス動画ID
     * @param string $user_id ユーザーID
     * @return \Cake\Http\Response|null listアクションへ
     * @throws \Cake\Datasource\Exception\RecordNotFoundException レコードが存在しない場合
     */
    public function delete($id, $user_id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $danceVideo = $this->DanceVideos->get($id);

        if ($this->DanceVideos->delete($danceVideo)) {
            $this->Flash->success(__('削除しました。'));
        } else {
            $this->Flash->error(__('削除できません。問題が解決しなければサポートに連絡してください。'));
        }

        return $this->redirect(['action' => 'list', $user_id]);
    }
}
