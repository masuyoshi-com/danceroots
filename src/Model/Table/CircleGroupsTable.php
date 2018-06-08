<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CircleGroups Model
 *
 * @property \App\Model\Table\CirclesTable|\Cake\ORM\Association\BelongsTo $Circles
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\CircleGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\CircleGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CircleGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CircleGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CircleGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CircleGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CircleGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class CircleGroupsTable extends Table
{
    /**
     * 初期化メソッド
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('circle_groups');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Circles', [
            'foreignKey' => 'circle_id',
            'joinType'   => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType'   => 'INNER'
        ]);
    }

    /**
     * バリデート
     *
     * @param \Cake\Validation\Validator $validator
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        return $validator;
    }


    /**
     * ルールチェッカー - サークルIDとユーザーIDが必ず存在すること
     *
     * @param \Cake\ORM\RulesChecker $rules
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['circle_id'], 'Circles'));
        $rules->add($rules->existsIn(['user_id'],   'Users'));

        return $rules;
    }

}
