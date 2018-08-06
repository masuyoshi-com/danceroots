<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudioSchedules Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\StudioSchedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\StudioSchedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StudioSchedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StudioSchedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudioSchedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StudioSchedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StudioSchedule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudioSchedulesTable extends Table
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

        $this->setTable('studio_schedules');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 20)
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        $validator
            ->integer('week')
            ->requirePresence('week', 'create')
            ->notEmpty('week');

        $validator
            ->scalar('start')
            ->maxLength('start', 30)
            ->requirePresence('start', 'create')
            ->notEmpty('start');

        $validator
            ->scalar('end')
            ->maxLength('end', 30)
            ->requirePresence('end', 'create')
            ->notEmpty('end');

        $validator
            ->scalar('image')
            ->maxLength('image', 150)
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        $validator
            ->scalar('youtube')
            ->maxLength('youtube', 100)
            ->requirePresence('youtube', 'create')
            ->notEmpty('youtube');

        $validator
            ->scalar('profile')
            ->maxLength('profile', 100)
            ->requirePresence('profile', 'create')
            ->notEmpty('profile');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
