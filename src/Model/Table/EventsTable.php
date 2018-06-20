<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Events Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EventEntriesTable|\Cake\ORM\Association\HasMany $EventEntries
 * @property \App\Model\Table\EventRepliesTable|\Cake\ORM\Association\HasMany $EventReplies
 *
 * @method \App\Model\Entity\Event get($primaryKey, $options = [])
 * @method \App\Model\Entity\Event newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Event[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Event|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Event[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Event findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \vendor\xety\cake3-upload
 */
class EventsTable extends Table
{
    const EVENT_IMAGE_PATH = 'upload/event/:md5';

    /**
     * 初期化
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('events');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'image' => [
                    'path'   => self::EVENT_IMAGE_PATH,
                    'prefix' => '../'
                ]
            ]
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType'   => 'INNER'
        ]);
        $this->hasMany('EventEntries', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('EventReplies', [
            'foreignKey' => 'event_id'
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
            ->scalar('event_name')
            ->maxLength('event_name', 255)
            ->requirePresence('event_name', 'create')
            ->notEmpty('event_name')
            ->add('event_name', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('intro')
            ->maxLength('intro', 255)
            ->requirePresence('intro', 'create')
            ->notEmpty('intro')
            ->add('intro', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('category')
            ->maxLength('category', 150)
            ->requirePresence('category', 'create')
            ->notEmpty('category');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmpty('image');

        $validator
            ->add('image_file', 'file', [
                'rule' => ['mimeType', ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']],
                'message' => '拡張子が違います。'
            ])
            ->allowEmpty('image_file');

        $validator
            ->scalar('youtube')
            ->maxLength('youtube', 255)
            ->allowEmpty('youtube')
            ->add('youtube', 'valid-url', [
                'rule'    => ['url', true],
                'message' => '正当なURLを入力してください。'
            ])
            ->add('youtube', 'custom', [
                'rule'     => 'isYoutube',
                'provider' => 'custom',
                'message'  => 'Youtube動画ではありません。'
            ]);

        $validator
            ->date('event_date')
            ->requirePresence('event_date', 'create')
            ->notEmpty('event_date', '開催日を入力してください。');

        $validator
            ->scalar('start')
            ->maxLength('start', 10)
            ->requirePresence('start', 'create')
            ->notEmpty('start');

        $validator
            ->scalar('end')
            ->maxLength('end', 10)
            ->requirePresence('end', 'create')
            ->notEmpty('end');

        $validator
            ->scalar('pref')
            ->maxLength('pref', 255)
            ->requirePresence('pref', 'create')
            ->notEmpty('pref');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmpty('address')
            ->add('address', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('place')
            ->maxLength('place', 255)
            ->requirePresence('place', 'create')
            ->notEmpty('place')
            ->add('place', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('entry')
            ->maxLength('entry', 255)
            ->allowEmpty('entry');

        $validator
            ->requirePresence('recruit_flag', 'create')
            ->notEmpty('recruit_flag');

        $validator
            ->scalar('entry_fee')
            ->maxLength('entry_fee', 50)
            ->allowEmpty('entry_fee');

        $validator
            ->scalar('guest')
            ->allowEmpty('guest');

        $validator
            ->scalar('event_detail')
            ->requirePresence('event_detail', 'create')
            ->notEmpty('event_detail');

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
        return $rules;
    }


    /**
    * イベント検索 - 都道府県・カテゴリ・フリーワード
    *
    * @param array $requests
    */
    public function findBySearch($requests)
    {
        return $this->find('all')
            ->where(['Events.pref LIKE'     => '%' . $requests['pref'] . '%'])
            ->where(['Events.category LIKE' => '%' . $requests['category'] . '%'])
            ->where(['OR' => [
                ['Users.username LIKE'      => '%' . $requests['word'] . '%'],
                ['Events.event_name LIKE'   => '%' . $requests['word'] . '%'],
                ['Events.address LIKE'      => '%' . $requests['word'] . '%'],
                ['Events.place LIKE'        => '%' . $requests['word'] . '%'],
                ['Events.guest LIKE'        => '%' . $requests['word'] . '%'],
                ['Events.event_detail LIKE' => '%' . $requests['word'] . '%']]])
            ->andWhere(['Events.delete_flag' => 0])
            ;
    }

}
