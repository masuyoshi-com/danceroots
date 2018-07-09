<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecommendVideos Controller
 *
 * @property \App\Model\Table\RecommendVideosTable $RecommendVideos
 *
 * @method \App\Model\Entity\RecommendVideo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecommendVideosController extends AppController
{
    public $search_keys = ['genre', 'word'];

    public $paginate = [
        'limit' => 20,
        'order' => ['RecommendVideos.created' => 'desc']
    ];


    /**
     * おすすめダンス動画一覧
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

            $query       = $this->RecommendVideos->findBySearch($this->request->query);
            $reco_videos = $this->paginate($query)->toArray();

            $this->Session->write('reco_video_search_request', $this->request->query);

        } else {
            $reco_videos = $this->paginate($this->RecommendVideos)->toArray();
        }

        if ($this->Session->check('reco_video_search_request')) {
            $this->request->data = $this->Session->read('reco_video_search_request');
        }

        // YoutubeIDのみに変更
        if ($reco_videos) {
            for ($i = 0; $i < count($reco_videos); $i++) {
                $reco_videos[$i]['youtube'] = $this->Common->getYoutubeId($reco_videos[$i]['youtube']);
            }
        }

        $this->set('genres', $this->Common->valueToKey($this->genres));
        $this->set(compact('reco_videos'));
    }
    
}
