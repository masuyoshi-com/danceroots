<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
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

    // 検索Form名
    public $search_keys = ['genre', 'word'];

    // iTunes ジャンル
    public $genres = [
        'ヒップホップ／ラップ', 'R&B／ソウル', 'サウンドトラック', 'ジャズ', 'ダンス',
        'レゲエ', 'エレクトロニック', 'オルタナティブ', 'ポップ', 'ロック', 'J-Pop',
    ];

    // 年代別
    public $years = [
        '1980,1990' => '1980 ～ 1990', '1990,2000' => '1990 ～ 2000',
        '2000,2010' => '2000 ～ 2010', '2010,2050' => '2010 ～ 現在'
    ];

    // アルファベット検索用配列
    public $alphabets = [
        '0-9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L',
        'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];

    public $paginate = [
           'limit' => 30,
           'order' => ['DanceMusics.created' => 'desc'],
     ];

    /**
     * ミュージック共有検索・一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = ['contain' => ['Users']];

        if ($this->request->query) {

            for ($i = 0; $i < count($this->search_keys); $i++) {
                if (!isset($this->request->query[$this->search_keys[$i]])) {
                    $this->request->query[$this->search_keys[$i]] = '';
                }
            }

            $query       = $this->DanceMusics->findBySearch($this->request->query)->group('track_name');
            $danceMusics = $this->paginate($query)->toArray();

            $this->Session->write('music_search_request', $this->request->query);

        } else {
            $query       = $this->DanceMusics->find()->group('track_name');
            $collection  = new Collection($this->paginate($query)->toArray());
            $danceMusics = $collection->shuffle()->toList();
        }

        if ($this->Session->check('music_search_request')) {
            $this->request->data = $this->Session->read('music_search_request');
        }

        // 登録者区分プロフィールを取得 / 区分リンク取得
        if ($danceMusics) {
            for ($i = 0; $i < count($danceMusics); $i++) {
                $danceMusics[$i]['profile'] = $this->Common->getUsersByClassification($danceMusics[$i]['user']['classification'], $danceMusics[$i]['user']['id']);
                $danceMusics[$i]['link']    = $this->Common->linkSwitch($danceMusics[$i]['user']['classification'], 'view', $danceMusics[$i]['user']['username']);
            }
        }

        $this->set('years', $this->years);
        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('danceMusics'));
    }


    /**
     * ユーザー別ミュージックプレイリスト
     *
     * @param string $username ユーザー名
     * @return [type] [description]
     */
    public function detail($username = null)
    {
        $user = $this->DanceMusics->Users->findByUsername($username)->first();

        if ($user) {

            $query       = $this->DanceMusics->findByUserId($user->id);
            $danceMusics = $this->paginate($query);

            if (count($danceMusics) !== 0) {

                $user->profile = $this->Common->getUsersByClassification($user->classification, $user->id);
                $user->link    = $this->Common->linkSwitch($user->classification, 'view', $user->username);

                $this->set(compact('danceMusics', 'user'));
                // メッセージ用変数
                $this->set('to_user_id',  $user->id);
                $this->set('to_username', $user->username);
            } else {
                throw new NotFoundException(__('音楽データが見つかりませんでした。'));
            }
        } else {
            throw new NotFoundException(__('ユーザーが見つかりませんでした。'));
        }
    }


    /**
     * ミュージック登録
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        if (isset($this->request->query['term'])) {

            $url = self::ITUNES_API_URL . urlencode($this->request->query['term']) . self::ITUNES_QUERY_OPTIONS;

            $option = [
                CURLOPT_RETURNTRANSFER => true, // 文字列として返す
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
            $this->Session->write('term_search_request', $this->request->query['term']);
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

                    // itunes API データが存在しない可能性のあるカラム notice回避
                    if (isset($songs[$i]['collectionArtistName'])) {
                        $this->request->data[$i]['collection_artist_name'] = $songs[$i]['collectionArtistName'];
                    } else {
                        $this->request->data[$i]['collection_artist_name'] = null;
                    }

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

                // ユーザIDに紐づいたトラック名が重複する場合、エラー
                foreach ($entities as $entity) {

                    $error_count = $this->DanceMusics->findByUserIdAndTrackName($entity->user_id, $entity->track_name)->count();

                    if ($error_count === 1) {
                        $this->Flash->error(__('既に登録済みのデータがあります。再度確認してください。'));
                        return $this->redirect($this->referer());
                    }
                }

                foreach ($entities as $entity) {
                    $this->DanceMusics->save($entity);
                }

                $this->Flash->success(__('ミュージックを登録しました。'));
                return $this->redirect(['action' => 'list']);
            } else {
                $this->Flash->error(__('未選択または登録できるレコードがありませんでした。'));
            }
        }

        $this->loadModel('Artists');
        $art = '';

        if ($this->request->query) {
            if (isset($this->request->query['art']) && $this->request->query['art'] === 'rb') {
                // R&Bアーティスト
                $artists = $this->Artists->getArtistByGenre($this->alphabets, 'rb');
                $this->Session->write('art_search_request', $this->request->query['art']);
                // ワード検索でGETリクエストを引き継ぐためviewに変数渡す
                $art = $this->request->query['art'];
            } else {
                // HipHopアーティスト
                $artists = $this->Artists->getArtistByGenre($this->alphabets, 'hiphop');
                // セレクトボックスでhiphopが再度選択された場合
                if (isset($this->request->query['art'])) {
                    $this->Session->write('art_search_request', $this->request->query['art']);
                    $art = $this->request->query['art'];
                }
            }
        } else {
            // デフォルトはhiphopアーティスト
            $artists = $this->Artists->getArtistByGenre($this->alphabets, 'hiphop');
        }

        // 検索項目状態があればリード
        if ($this->Session->check('art_search_request')) {
            $this->request->data['art'] = $this->Session->read('art_search_request');
        }

        if ($this->Session->check('term_search_request')) {
            $this->request->data['term'] = $this->Session->read('term_search_request');
        }

        $this->set(compact('danceMusic', 'artists', 'art'));
        $this->set('alphabets', $this->alphabets);
    }


    /**
     * マイ ミュージック
     */
    public function list()
    {
        $user        = $this->DanceMusics->Users->findById($this->Auth->user('id'))->first();
        $query       = $this->DanceMusics->findByUserId($this->Auth->user('id'));
        $danceMusics = $this->paginate($query);

        $this->set(compact('danceMusics', 'user'));
    }


    /**
     * ミュージックランキング
     *
     * @return \Cake\Http\Response|null
     */
    public function ranking()
    {
        $urls = [
            // トップソング($songs1)
            'https://rss.itunes.apple.com/api/v1/us/itunes-music/top-songs/all/20/explicit.json',
            // トップアルバム($songs2)
            'https://rss.itunes.apple.com/api/v1/us/itunes-music/top-albums/all/20/explicit.json',
            // 最新リリース($songs3)
            'https://rss.itunes.apple.com/api/v1/us/itunes-music/recent-releases/all/20/explicit.json',
            // 新着ミュージック($songs4)
            'https://rss.itunes.apple.com/api/v1/us/itunes-music/new-music/all/20/explicit.json',
            // 注目トラック($songs5)
            'https://rss.itunes.apple.com/api/v1/us/itunes-music/hot-tracks/all/20/explicit.json'
        ];

        $option = [
            CURLOPT_RETURNTRANSFER => true, // 文字列として返す
            CURLOPT_TIMEOUT        => 3,    // タイムアウト時間
        ];

        for ($i = 0; $i < count($urls); $i++) {

            $ch = curl_init($urls[$i]);
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
                    $songs[$i] = $array;
                }
            }
            // テンプレートタグに変数数値合わせるため(初期値1から)
            $j = $i + 1;
            $this->set('songs' . $j, $songs[$i]['results']);
        }
    }


    /**
     * 音楽削除
     *
     * @param string|null $id Dance Music id.
     * @return \Cake\Http\Response|null リスト ユーザーID付与
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function delete($id = null)
    {
        $this->Common->referer();

        $this->request->allowMethod(['post', 'delete']);
        $danceMusic = $this->DanceMusics->get($id);

        if ($this->DanceMusics->delete($danceMusic)) {
            $this->Flash->success(__('音楽を削除しました。'));
        } else {
            $this->Flash->error(__('削除できません。問題が解決しなければサポートに連絡してください。'));
        }

        return $this->redirect(['action' => 'list']);
    }
}
