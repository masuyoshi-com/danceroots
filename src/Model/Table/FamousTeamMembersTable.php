<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FamousTeamMembers Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\FamousTeamsTable|\Cake\ORM\Association\BelongsTo $FamousTeams
 * @property \App\Model\Table\FamousDancersTable|\Cake\ORM\Association\BelongsTo $FamousDancers
 *
 * @method \App\Model\Entity\FamousTeamMember get($primaryKey, $options = [])
 * @method \App\Model\Entity\FamousTeamMember newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FamousTeamMember[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FamousTeamMember|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FamousTeamMember patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FamousTeamMember[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FamousTeamMember findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FamousTeamMembersTable extends Table
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

        $this->setTable('famous_team_members');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FamousTeams', [
            'foreignKey' => 'famous_team_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FamousDancers', [
            'foreignKey' => 'famous_dancer_id'
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
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmpty('image');

        $validator
            ->requirePresence('leader_flag', 'create')
            ->notEmpty('leader_flag');

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
        $rules->add($rules->existsIn(['famous_team_id'], 'FamousTeams'));
        $rules->add($rules->existsIn(['famous_dancer_id'], 'FamousDancers'));

        return $rules;
    }
}
