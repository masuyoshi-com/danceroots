<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Expression\QueryExpression;

/**
 * DanceMusics Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\DanceMusic get($primaryKey, $options = [])
 * @method \App\Model\Entity\DanceMusic newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DanceMusic[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DanceMusic|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DanceMusic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DanceMusic[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DanceMusic findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DanceMusicsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('dance_musics');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType'   => 'INNER'
        ]);
    }

    /**
     * 保存時ルールチェッカー
     *
     * @param \Cake\ORM\RulesChecker $rules
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }


    /**
    * ダンス音楽検索 - ジャンル/フリーワード
    *
    * @param array $requests
    */
    public function findBySearch($requests)
    {
        if ($requests['year']) {
            $years = explode(',', $requests['year']);
            $start = date('Y-m-d', strtotime($years[0] . '/01/01'));
            $end   = date('Y-m-d', strtotime($years[1] . '/01/01'));

            return $this->find('all')
                ->where(['DanceMusics.primary_genre_name LIKE' => '%' . $requests['genre'] . '%'])
                ->where(function (QueryExpression $exp, Query $q) use ($start, $end) {
                    return $exp->between('release_date', $start, $end);
                })
                ->where(['OR' => [
                    ['Users.username LIKE'                     => '%' . $requests['word'] . '%'],
                    ['DanceMusics.artist_name LIKE'            => '%' . $requests['word'] . '%'],
                    ['DanceMusics.collection_name LIKE'        => '%' . $requests['word'] . '%'],
                    ['DanceMusics.track_name LIKE'             => '%' . $requests['word'] . '%'],
                    ['DanceMusics.collection_artist_name LIKE' => '%' . $requests['word'] . '%']]])
                ;
        } else {
            return $this->find('all')
                ->where(['DanceMusics.primary_genre_name LIKE' => '%' . $requests['genre'] . '%'])
                ->where(['OR' => [
                    ['Users.username LIKE'                     => '%' . $requests['word'] . '%'],
                    ['DanceMusics.artist_name LIKE'            => '%' . $requests['word'] . '%'],
                    ['DanceMusics.collection_name LIKE'        => '%' . $requests['word'] . '%'],
                    ['DanceMusics.track_name LIKE'             => '%' . $requests['word'] . '%'],
                    ['DanceMusics.collection_artist_name LIKE' => '%' . $requests['word'] . '%']]])
                ;
        }

    }
}
