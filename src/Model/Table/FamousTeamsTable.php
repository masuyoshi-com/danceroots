<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FamousTeams Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Users
 * @property |\Cake\ORM\Association\HasMany $FamousTeamMembers
 *
 * @method \App\Model\Entity\FamousTeam get($primaryKey, $options = [])
 * @method \App\Model\Entity\FamousTeam newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FamousTeam[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FamousTeam|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FamousTeam patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FamousTeam[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FamousTeam findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FamousTeamsTable extends Table
{
    const FAMOUS_TEAM_IMAGE_PATH = 'upload/famous_team/:md5';

    /**
     * 初期化メソッド
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('famous_teams');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'icon' => [
                    'path'   => self::FAMOUS_TEAM_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image' => [
                    'path'   => self::FAMOUS_TEAM_IMAGE_PATH,
                    'prefix' => '../'
                ]
            ]
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType'   => 'INNER'
        ]);
        $this->hasMany('FamousTeamMembers', [
            'foreignKey' => 'famous_team_id'
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

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmpty('image');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 20)
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        $validator
            ->scalar('pref')
            ->maxLength('pref', 20)
            ->requirePresence('pref', 'create')
            ->notEmpty('pref');

        $validator
            ->scalar('period')
            ->maxLength('period', 100)
            ->requirePresence('period', 'create')
            ->notEmpty('period');

        $validator
            ->scalar('profile')
            ->requirePresence('profile', 'create')
            ->notEmpty('profile');

        $validator
            ->scalar('youtube1')
            ->maxLength('youtube1', 255)
            ->allowEmpty('youtube1');

        $validator
            ->scalar('youtube2')
            ->maxLength('youtube2', 255)
            ->allowEmpty('youtube2');

        $validator
            ->scalar('youtube3')
            ->maxLength('youtube3', 255)
            ->allowEmpty('youtube3');

        $validator
            ->scalar('style')
            ->requirePresence('style', 'create')
            ->notEmpty('style');

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
