<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecommendMusics Model
 *
 * @method \App\Model\Entity\RecommendMusic get($primaryKey, $options = [])
 * @method \App\Model\Entity\RecommendMusic newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RecommendMusic[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RecommendMusic|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RecommendMusic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RecommendMusic[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RecommendMusic findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RecommendMusicsTable extends Table
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

        $this->setTable('recommend_musics');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }


    /**
    * おすすめミュージック検索 - ジャンル/フリーワード
    *
    * @param array $requests
    * @todo 年代別検索追加
    */
    public function findBySearch($requests)
    {
        return $this->find('all')
            ->where(['RecommendMusics.primary_genre_name LIKE' => '%' . $requests['genre'] . '%'])
            ->where(['OR' => [
                ['RecommendMusics.artist_name LIKE'            => '%' . $requests['word'] . '%'],
                ['RecommendMusics.collection_name LIKE'        => '%' . $requests['word'] . '%'],
                ['RecommendMusics.track_name LIKE'             => '%' . $requests['word'] . '%'],
                ['RecommendMusics.collection_artist_name LIKE' => '%' . $requests['word'] . '%']]])
            ;
    }
}
