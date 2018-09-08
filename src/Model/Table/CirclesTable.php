<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Circles Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CircleGroupsTable|\Cake\ORM\Association\HasMany $CircleGroups
 *
 * @method \App\Model\Entity\Circle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Circle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Circle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Circle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Circle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Circle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Circle findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \vendor\xety\cake3-upload
 */
class CirclesTable extends Table
{
    const CIRCLE_IMAGE_PATH = 'upload/circle/:md5';

    /**
     * 初期化
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('circles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'image' => [
                    'path'   => self::CIRCLE_IMAGE_PATH,
                    'prefix' => '../'
                ]
            ]
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType'   => 'INNER'
        ]);

        $this->hasMany('CircleGroups', [
            'foreignKey' => 'circle_id',
            'dependent'  => true,
        ]);

        $this->hasMany('CircleMessages', [
            'foreignKey' => 'circle_id',
            'dependent'  => true,
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
            ->scalar('pref')
            ->maxLength('pref', 50)
            ->requirePresence('pref', 'create')
            ->notEmpty('pref');

        $validator
            ->scalar('city')
            ->maxLength('city', 50)
            ->requirePresence('city', 'create')
            ->notEmpty('city')
            ->add('city', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title')
            ->add('title', 'custom', [
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
            ->scalar('place')
            ->maxLength('place', 150)
            ->allowEmpty('place');

        $validator
            ->scalar('distinction')
            ->maxLength('distinction', 50)
            ->requirePresence('distinction', 'create')
            ->notEmpty('distinction');

        $validator
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('circle_detail')
            ->requirePresence('circle_detail', 'create')
            ->notEmpty('circle_detail');

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
            ->scalar('genre')
            ->maxLength('genre', 100)
            ->allowEmpty('genre');

        $validator
            ->scalar('station')
            ->maxLength('station', 100)
            ->allowEmpty('station');

        $validator
            ->scalar('age')
            ->maxLength('age', 150)
            ->requirePresence('age', 'create')
            ->notEmpty('age');

        $validator
            ->scalar('conditions')
            ->maxLength('conditions', 255)
            ->requirePresence('conditions', 'create')
            ->allowEmpty('conditions')
            ->add('conditions', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('purpose')
            ->allowEmpty('purpose');

        $validator
            ->allowEmpty('public_flag');

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
    * ダンスサークル検索 - 都道府県・ジャンル・フリーワード
    *
    * @param array $requests
    */
    public function findBySearch($requests)
    {
        return $this->find('all')
            ->where(['Circles.pref LIKE'  => '%' . $requests['pref'] . '%'])
            ->where(['Circles.genre LIKE' => '%' . $requests['genre'] . '%'])
            ->where(['OR' => [
                ['Circles.name LIKE'    => '%' . $requests['word'] . '%'],
                ['Circles.title LIKE'   => '%' . $requests['word'] . '%'],
                ['Circles.city LIKE'    => '%' . $requests['word'] . '%'],
                ['Circles.station LIKE' => '%' . $requests['word'] . '%']]])
            ->andWhere(['Circles.public_flag' => 0])
            ->andWhere(['Circles.delete_flag' => 0])
            ;
    }
}
