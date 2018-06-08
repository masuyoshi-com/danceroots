<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prefectures Model
 *
 * @method \App\Model\Entity\Prefecture get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prefecture newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Prefecture[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prefecture|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prefecture patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prefecture[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prefecture findOrCreate($search, callable $callback = null, $options = [])
 */
class PrefecturesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('prefectures');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('prefecture')
            ->maxLength('prefecture', 255)
            ->requirePresence('prefecture', 'create')
            ->notEmpty('prefecture');

        return $validator;
    }
}
