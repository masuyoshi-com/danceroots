<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ユーザーモデル
 *
 * @property \App\Model\Table\CircleGroupsTable|\Cake\ORM\Association\HasMany   $CircleGroups
 * @property \App\Model\Table\CircleMessagesTable|\Cake\ORM\Association\HasMany $CircleMessages
 * @property \App\Model\Table\CirclesTable|\Cake\ORM\Association\HasMany        $Circles
 * @property \App\Model\Table\DanceMusicsTable|\Cake\ORM\Association\HasMany    $DanceMusics
 * @property \App\Model\Table\DanceVideosTable|\Cake\ORM\Association\HasMany    $DanceVideos
 * @property \App\Model\Table\DancersTable|\Cake\ORM\Association\HasMany        $Dancers
 * @property \App\Model\Table\EventEntriesTable|\Cake\ORM\Association\HasMany   $EventEntries
 * @property \App\Model\Table\EventsTable|\Cake\ORM\Association\HasMany         $Events
 * @property \App\Model\Table\FeedbacksTable|\Cake\ORM\Association\HasMany      $Feedbacks
 * @property \App\Model\Table\GeneralsTable|\Cake\ORM\Association\HasMany       $Generals
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\HasMany           $Jobs
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\HasMany       $Messages
 * @property \App\Model\Table\OrganizersTable|\Cake\ORM\Association\HasMany     $Organizers
 * @property \App\Model\Table\StudiosTable|\Cake\ORM\Association\HasMany        $Studios
 * @property \App\Model\Table\TeamGroupsTable|\Cake\ORM\Association\HasMany     $TeamGroups
 * @property \App\Model\Table\TeamsTable|\Cake\ORM\Association\HasMany          $Teams
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo       $Groups
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Acl.Acl', ['type' => 'requester']);

        // ACL対象グループテーブル
        $this->belongsTo('Groups', [
            'className'  => 'Groups',
            'foreignKey' => 'group_id',
            'joinType'   => 'INNER'
        ]);

        $this->hasMany('CircleGroups', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('CircleMessages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Circles', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('DanceMusics', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('DanceVideos', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Dancers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('EventEntries', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Events', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Feedbacks', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Generals', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Jobs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Organizers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Studios', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('TeamGroups', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Teams', [
            'foreignKey' => 'user_id'
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
            ->scalar('username')
            ->maxLength('username', 100)
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 50)
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->add('password', [
               'length' => [
                   'rule'    => ['minLength', 5],
                   'message' => 'パスワードは5文字以上です。',
               ]
           ])
           ->add('password', 'custom', [
               'rule'     => 'isSpace',
               'provider' => 'custom',
               'message'  => '空白のみは受け付けません。'
           ]);

        $validator
            ->integer('classification')
            ->requirePresence('classification', 'create')
            ->notEmpty('classification');

        return $validator;
    }

    /**
     * ルールチェッカー eMailはユニークであること
     *
     * @param \Cake\ORM\RulesChecker $rules
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']), [
            'message' => '既に登録されているユーザー名です。'
        ]);

        $rules->add($rules->isUnique(['email']), [
            'message' => '既に登録されているメールアドレスです。'
        ]);

        return $rules;
    }
}
