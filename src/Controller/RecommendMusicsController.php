<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecommendMusics Controller
 *
 * @property \App\Model\Table\RecommendMusicsTable $RecommendMusics
 *
 * @method \App\Model\Entity\RecommendMusic[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecommendMusicsController extends AppController
{
    // 検索Form名
    public $search_keys = ['genre', 'word'];

    // iTunes ジャンル
    public $genres = [
        'ヒップホップ／ラップ', 'R&B／ソウル', 'サウンドトラック', 'ジャズ', 'ダンス',
        'レゲエ', 'エレクトロニック', 'オルタナティブ', 'ポップ', 'ロック', 'J-Pop',
    ];

    public $paginate = [
           'limit' => 50,
           'order' => ['RecommendMusics.created' => 'desc'],
    ];


    /**
     * おすすめミュージック検索・一覧
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

            $query           = $this->RecommendMusics->findBySearch($this->request->query);
            $recommendMusics = $this->paginate($query)->toArray();

            $this->Session->write('reco_music_search_request', $this->request->query);

        } else {
            $recommendMusics = $this->paginate($this->RecommendMusics)->toArray();
        }

        if ($this->Session->check('reco_music_search_request')) {
            $this->request->data = $this->Session->read('reco_music_search_request');
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('recommendMusics'));
    }
}
