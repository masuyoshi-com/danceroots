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

    // 年代別
    public $years = [
        '1980,1990' => '1980 ～ 1990', '1990,2000' => '1990 ～ 2000',
        '2000,2010' => '2000 ～ 2010', '2010,2050' => '2010 ～ 現在'
    ];


    public $paginate = [
           'limit' => 50,
           'order' => ['RecommendMusics.created' => 'desc'],
    ];


    /**
     * 初期化メソッド
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['public']);
    }


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

        $this->set('years', $this->years);
        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('recommendMusics'));
    }


    /**
     * 一般公開おすすめミュージック検索・一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function public()
    {
        $this->viewBuilder()->setLayout('public_fluid');

        if ($this->request->query) {

            for ($i = 0; $i < count($this->search_keys); $i++) {
                if (!isset($this->request->query[$this->search_keys[$i]])) {
                    $this->request->query[$this->search_keys[$i]] = '';
                }
            }

            $query           = $this->RecommendMusics->findBySearch($this->request->query);
            $recommendMusics = $this->paginate($query)->toArray();

            $this->Session->write('public_reco_music_search', $this->request->query);

        } else {
            $recommendMusics = $this->paginate($this->RecommendMusics)->toArray();
        }

        if ($this->Session->check('public_reco_music_search')) {
            $this->request->data = $this->Session->read('public_reco_music_search');
        }

        $this->set('years', $this->years);
        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('recommendMusics'));
    }
}
