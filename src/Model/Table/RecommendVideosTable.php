<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecommendVideos Model
 *
 * @method \App\Model\Entity\RecommendVideo get($primaryKey, $options = [])
 * @method \App\Model\Entity\RecommendVideo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RecommendVideo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RecommendVideo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RecommendVideo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RecommendVideo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RecommendVideo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RecommendVideosTable extends Table
{

    /**
     * 初期化
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('recommend_videos');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }


    /**
    * おすすめダンス動画検索 - ジャンル・フリーワード
    *
    * @param array $requests
    */
    public function findBySearch($requests)
    {
        return $this->find('all')
            ->where(['RecommendVideos.genre LIKE' => '%' . $requests['genre'] . '%'])
            ->where(['OR' => [
                ['RecommendVideos.title LIKE' => '%' . $requests['word'] . '%']]])
            ;
    }

}
