<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FamousEvents Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\FamousEvent get($primaryKey, $options = [])
 * @method \App\Model\Entity\FamousEvent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FamousEvent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FamousEvent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FamousEvent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FamousEvent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FamousEvent findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FamousEventsTable extends Table
{
    const FAMOUS_EVENT_IMAGE_PATH = 'upload/famous_event/:md5';

    /**
     * 初期化メソッド
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('famous_events');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'image' => [
                    'path'   => self::FAMOUS_EVENT_IMAGE_PATH,
                    'prefix' => '../'
                ]
            ]
        ]);

        $this->addBehavior('Timestamp');

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
        $validator->provider('custom', 'App\Model\Validation\CustomValidation');

        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('category')
            ->maxLength('category', 50)
            ->requirePresence('category', 'create')
            ->notEmpty('category');

        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->notEmpty('title')
            ->add('title', 'custom', [
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
            ->date('event_date')
            ->requirePresence('event_date', 'create')
            ->notEmpty('event_date');

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
            ->scalar('body')
            ->allowEmpty('body');

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
}
