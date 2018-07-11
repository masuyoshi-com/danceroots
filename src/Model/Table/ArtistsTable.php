<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Expression\QueryExpression;

/**
 * Artists Model
 *
 * @method \App\Model\Entity\Artist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Artist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Artist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Artist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Artist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Artist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Artist findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArtistsTable extends Table
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

        $this->setTable('artists');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }


    /**
     * GETメソッドにより指定ジャンルをセレクト
     *
     * @param array  $alphabets アルファべット配列
     * @param string $genre     ジャンル名
     * @return array $artists   アーティストデータ
     */
    public function getArtistByGenre($alphabets, $genre)
    {
        $artists = [];
        for ($i = 0; $i < count($alphabets); $i++) {

            if ($i === 0) {

                $artists[$alphabets[$i]] = $this->find()
                    ->select(['name'])
                    ->andWhere(['Artists.genre' => $genre])
                    ->where(function (QueryExpression $exp, Query $q) {
                    return $exp->between('Artists.name', 0, 9);
                })->toArray();

            } else {
                $artists[$alphabets[$i]] = $this->find('all', [
                    'conditions' => ['Artists.name LIKE' => $alphabets[$i] . '%']
                ])
                ->select(['name'])
                ->andWhere(['Artists.genre' => $genre])
                ->toArray();
            }
        }
        return $artists;
    }
}
