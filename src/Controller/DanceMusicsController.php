<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DanceMusics Controller
 *
 * @property \App\Model\Table\DanceMusicsTable $DanceMusics
 *
 * @method \App\Model\Entity\DanceMusic[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DanceMusicsController extends AppController
{
    // あらかじめ音楽のみに絞ったURLを定義
    const ITUNES_API_URL       = 'https://itunes.apple.com/search?term=';
    const ITUNES_QUERY_OPTIONS = '&country=JP&entity=song&media=music&lang=ja_jp';

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $danceMusics = $this->paginate($this->DanceMusics);

        $this->set('genres', $this->genres);
        $this->set(compact('danceMusics'));
    }

    /**
     * View method
     *
     * @param string|null $id Dance Music id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $danceMusic = $this->DanceMusics->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('danceMusic', $danceMusic);
    }


    /**
     * ダンス音楽検索
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {

        if ($this->request->query) {

            $url  =  self::ITUNES_API_URL . urlencode($this->request->query['term']) . self::ITUNES_QUERY_OPTIONS;

            $option = [
                CURLOPT_RETURNTRANSFER => true, //文字列として返す
                CURLOPT_TIMEOUT        => 3,    // タイムアウト時間
            ];

            $ch = curl_init($url);
            curl_setopt_array($ch, $option);

            $json    = curl_exec($ch);
            $info    = curl_getinfo($ch);
            $errorNo = curl_errno($ch);

            // OK以外はエラーなので空白配列を返す
            if ($errorNo !== CURLE_OK) {
                // 詳しくエラーハンドリングしたい場合はerrorNoで確認
                // タイムアウトの場合はCURLE_OPERATION_TIMEDOUT
                $jsons = [];
            }

            // 200以外のステータスコードは失敗とみなし空配列を返す
            if ($info['http_code'] !== 200) {
                $jsons = [];
            }

            // 文字列から変換
            $jsons = json_decode($json, true);

            if ($jsons) {
                foreach ($jsons as $key => $array) {
                    $songs = $array;
                }
            }
            // 検索キーワードをセッションに記録しておく
            $this->Session->write('song_search_request', $this->request->query);
            $this->set(compact('songs'));
        }

        if ($this->request->is('post')) {

            for ($i = 0; $i < count($songs); $i++) {
                if ($this->request->data['song' . $i] === '1') {
                    // 保存レコード作成
                    $this->request->data[$i]['user_id']                = $this->request->data['user_id'];
                    $this->request->data[$i]['artist_name']            = $songs[$i]['artistName'];
                    $this->request->data[$i]['collection_name']        = $songs[$i]['collectionName'];
                    $this->request->data[$i]['track_name']             = $songs[$i]['trackName'];
                    $this->request->data[$i]['collection_artist_name'] = $songs[$i]['collectionArtistName'];
                    $this->request->data[$i]['artist_view_url']        = $songs[$i]['artistViewUrl'];
                    $this->request->data[$i]['collection_view_url']    = $songs[$i]['collectionViewUrl'];
                    $this->request->data[$i]['track_view_url']         = $songs[$i]['trackViewUrl'];
                    $this->request->data[$i]['preview_url']            = $songs[$i]['previewUrl'];
                    $this->request->data[$i]['artwork_url']            = $songs[$i]['artworkUrl100'];
                    $this->request->data[$i]['collection_price']       = $songs[$i]['collectionPrice'];
                    $this->request->data[$i]['track_price']            = $songs[$i]['trackPrice'];
                    $this->request->data[$i]['release_date']           = $songs[$i]['releaseDate'];
                    $this->request->data[$i]['track_explicitness']     = $songs[$i]['trackExplicitness'];
                    $this->request->data[$i]['country']                = $songs[$i]['country'];
                    $this->request->data[$i]['currency']               = $songs[$i]['currency'];
                    $this->request->data[$i]['primary_genre_name']     = $songs[$i]['primaryGenreName'];
                    // チェック済みレコード破棄
                    unset($this->request->data['song' . $i]);
                }
                // チェックがなかったレコード破棄
                unset($this->request->data['song' . $i]);
            }
            // ユーザーIDはレコードに追加済みなので不要
            unset($this->request->data['user_id']);

            $entities = $this->DanceMusics->newEntities($this->request->getData());

            if ($entities) {
                foreach ($entities as $entity) {
                    $this->DanceMusics->save($entity);
                }
                $this->Flash->success(__('ミュージックを登録しました。'));
                return $this->redirect(['action' => 'list', $this->Auth->user('id')]);
            } else {
                $this->Flash->error(__('未選択または登録できるレコードがありませんでした。'));
            }
        }

        // 検索項目状態があればリード
        if ($this->Session->check('song_search_request')) {
            $this->request->data = $this->Session->read('song_search_request');
        }
        $this->set(compact('danceMusic'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Dance Music id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        /*
        $danceMusic = $this->DanceMusics->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $danceMusic = $this->DanceMusics->patchEntity($danceMusic, $this->request->getData());
            if ($this->DanceMusics->save($danceMusic)) {
                $this->Flash->success(__('The dance music has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dance music could not be saved. Please, try again.'));
        }
        $users = $this->DanceMusics->Users->find('list', ['limit' => 200]);
        */
        $this->set('genres', $this->genres);
        $this->set(compact('danceMusic', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dance Music id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $danceMusic = $this->DanceMusics->get($id);
        if ($this->DanceMusics->delete($danceMusic)) {
            $this->Flash->success(__('The dance music has been deleted.'));
        } else {
            $this->Flash->error(__('The dance music could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
