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
    const F_TEAM_MEMBERS_IMAGE_PATH = 'upload/famous_team_member/:md5';


    /**
     * 初期化メソッド
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('famous_team_members');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'icon' => [
                    'path'   => self::F_TEAM_MEMBERS_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image' => [
                    'path'   => self::F_TEAM_MEMBERS_IMAGE_PATH,
                    'prefix' => '../'
                ]
            ]
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType'   => 'INNER'
        ]);

        $this->belongsTo('FamousTeams', [
            'foreignKey' => 'famous_team_id',
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
        $validator->provider('custom', 'App\Model\Validation\CustomValidation');

        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmpty('image');

        $validator
            ->add('image_file', 'file', [
                'rule'    => ['mimeType', ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']],
                'message' => '拡張子が違います。'
            ])
            ->allowEmpty('image_file');

        $validator
            ->scalar('profile_url')
            ->maxLength('profile_url', 150)
            ->requirePresence('profile_url', 'create')
            ->allowEmpty('profile_url')
            ->add('profile_url', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ])
            ->add('profile_url', 'custom', [
                'rule'     => 'isDanceroots',
                'provider' => 'custom',
                'message'  => 'DancerootsのプロフィールURLではありません。'
            ]);

        $validator
            ->scalar('display_order')
            ->maxLength('display_order', 10)
            ->requirePresence('display_order', 'create')
            ->allowEmpty('display_order')
            ->add('display_order', 'validValue', [
                'rule'     => ['range', 0, 20],
                'message'  => '0 ～ 20 で設定してください。'
            ]);

        return $validator;
    }


    /**
     * ルールチェッカー
     *
     * @param \Cake\ORM\RulesChecker $rules
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['famous_team_id'], 'FamousTeams'));

        return $rules;
    }
}
