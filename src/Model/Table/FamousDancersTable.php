<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FamousDancers Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\FamousDancer get($primaryKey, $options = [])
 * @method \App\Model\Entity\FamousDancer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FamousDancer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FamousDancer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FamousDancer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FamousDancer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FamousDancer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FamousDancersTable extends Table
{
    const FAMOUS_DANCER_IMAGE_PATH = 'upload/famous_dancer/:md5';

    /**
     * 初期化メソッド
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('famous_dancers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'icon' => [
                    'path'   => self::FAMOUS_DANCER_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image' => [
                    'path'   => self::FAMOUS_DANCER_IMAGE_PATH,
                    'prefix' => '../'
                ]
            ]
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
        $validator->provider('custom', 'App\Model\Validation\CustomValidation');

        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('team_name')
            ->maxLength('team_name', 100)
            ->requirePresence('team_name', 'create')
            ->allowEmpty('team_name')
            ->add('team_name', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('pref')
            ->maxLength('pref', 50)
            ->requirePresence('pref', 'create')
            ->allowEmpty('pref');

        $validator
            ->scalar('icon')
            ->maxLength('icon', 255)
            ->allowEmpty('icon');

        $validator
            ->add('icon_file', 'file', [
                'rule'    => ['mimeType', ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']],
                'message' => '拡張子が違います。'
            ])
            ->allowEmpty('icon_file');

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
            ->scalar('genre')
            ->maxLength('genre', 20)
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        $validator
            ->scalar('profile')
            ->requirePresence('profile', 'create')
            ->notEmpty('profile');

        $validator
            ->scalar('iv_trigger')
            ->allowEmpty('iv_trigger');

        $validator
            ->scalar('iv_inspire')
            ->allowEmpty('iv_inspire');

        $validator
            ->scalar('iv_dancer')
            ->allowEmpty('iv_dancer');

        $validator
            ->scalar('iv_instructor')
            ->allowEmpty('iv_instructor');

        $validator
            ->scalar('iv_advice')
            ->allowEmpty('iv_advice');

        $validator
            ->scalar('youtube1')
            ->maxLength('youtube1', 255)
            ->allowEmpty('youtube1')
            ->add('youtube1', 'valid-url', [
                'rule'    => ['url', true],
                'message' => '正当なURLを入力してください。'
            ])
            ->add('youtube1', 'custom', [
                'rule'     => 'isYoutube',
                'provider' => 'custom',
                'message'  => 'YouTube動画ではありません。'
            ]);

        $validator
            ->scalar('youtube2')
            ->maxLength('youtube2', 255)
            ->allowEmpty('youtube2')
            ->add('youtube2', 'valid-url', [
                'rule'    => ['url', true],
                'message' => '正当なURLを入力してください。'
            ])
            ->add('youtube2', 'custom', [
                'rule'     => 'isYoutube',
                'provider' => 'custom',
                'message'  => 'YouTube動画ではありません。'
            ]);

        $validator
            ->scalar('youtube3')
            ->maxLength('youtube3', 255)
            ->allowEmpty('youtube3')
            ->add('youtube3', 'valid-url', [
                'rule'    => ['url', true],
                'message' => '正当なURLを入力してください。'
            ])
            ->add('youtube3', 'custom', [
                'rule'     => 'isYoutube',
                'provider' => 'custom',
                'message'  => 'YouTube動画ではありません。'
            ]);

        $validator
            ->scalar('sche_sun')
            ->allowEmpty('sche_sun');

        $validator
            ->scalar('sche_mon')
            ->allowEmpty('sche_mon');

        $validator
            ->scalar('sche_tue')
            ->allowEmpty('sche_tue');

        $validator
            ->scalar('sche_wed')
            ->allowEmpty('sche_wed');

        $validator
            ->scalar('sche_thu')
            ->allowEmpty('sche_thu');

        $validator
            ->scalar('sche_fri')
            ->allowEmpty('sche_fri');

        $validator
            ->scalar('sche_sat')
            ->allowEmpty('sche_sat');

        $validator
            ->scalar('twitter')
            ->maxLength('twitter', 255)
            ->allowEmpty('twitter')
            ->add('twitter', 'valid-url', [
                'rule'    => ['url', true],
                'message' => '正当なURLを入力してください。'
            ])
            ->add('twitter', 'custom', [
                'rule'     => 'isTwitter',
                'provider' => 'custom',
                'message'  => 'Twitterではありません。'
            ]);

        $validator
            ->scalar('facebook')
            ->maxLength('facebook', 255)
            ->allowEmpty('facebook')
            ->add('facebook', 'valid-url', [
                'rule'    => ['url', true],
                'message' => '正当なURLを入力してください。'
            ])
            ->add('facebook', 'custom', [
                'rule'     => 'isFacebook',
                'provider' => 'custom',
                'message'  => 'Facebookではありません。'
            ]);

        $validator
            ->scalar('instagram')
            ->maxLength('instagram', 255)
            ->allowEmpty('instagram')
            ->add('instagram', 'valid-url', [
                'rule'    => ['url', true],
                'message' => '正当なURLを入力してください。'
            ])
            ->add('instagram', 'custom', [
                'rule'     => 'isInstagram',
                'provider' => 'custom',
                'message'  => 'Instagramではありません。'
            ]);

        return $validator;
    }


    /**
     * ルールチェッカー ユーザーID必須
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
    * 有名ダンサー検索 - 都道府県・ジャンル・フリーワード
    *
    * @param array $requests
    */
    public function findBySearch($requests)
    {
        return $this->find('all')
            ->where(['FamousDancers.pref LIKE'  => '%' . $requests['pref'] . '%'])
            ->where(['FamousDancers.genre LIKE' => '%' . $requests['genre'] . '%'])
            ->where(['OR' => [
                ['Users.username LIKE'     => '%' . $requests['word'] . '%'],
                ['FamousDancers.name LIKE' => '%' . $requests['word'] . '%']]])
            ;
    }
}
