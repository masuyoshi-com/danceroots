<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Studios モデル
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Studio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Studio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Studio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Studio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Studio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Studio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Studio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \vendor\xety\cake3-upload
 */
class StudiosTable extends Table
{
    const STUDIO_IMAGE_PATH = 'upload/studio/:md5';

    /**
     * 初期化メソッド
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('studios');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'icon' => [
                    'path'   => self::STUDIO_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image1' => [
                    'path'   => self::STUDIO_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image2' => [
                    'path'   => self::STUDIO_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image3' => [
                    'path'   => self::STUDIO_IMAGE_PATH,
                    'prefix' => '../'
                ],
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
            ->scalar('studio_name')
            ->maxLength('studio_name', 255)
            ->requirePresence('studio_name', 'create')
            ->notEmpty('studio_name')
            ->add('studio_name', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('name')
            ->maxLength('name', 150)
            ->notEmpty('name')
            ->add('name', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('icon')
            ->maxLength('icon', 255)
            ->allowEmpty('icon');

        $validator
            ->add('icon_file', 'file', [
                'rule' => ['mimeType', ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']],
                'message' => '拡張子が違います。'
            ])
            ->allowEmpty('icon_file');

        $validator
            ->scalar('tel')
            ->maxLength('tel', 50)
            ->allowEmpty('tel');

        $validator
            ->scalar('self_intro')
            ->maxLength('self_intro', 255)
            ->notEmpty('self_intro')
            ->add('self_intro', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('pref')
            ->maxLength('pref', 50)
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
            ->scalar('station')
            ->maxLength('station', 100)
            ->allowEmpty('station');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->allowEmpty('url');

        $validator
            ->scalar('establishment')
            ->maxLength('establishment', 10)
            ->allowEmpty('establishment');

        $validator
            ->scalar('bussines_hours')
            ->maxLength('bussines_hours', 150)
            ->allowEmpty('bussines_hours');

        $validator
            ->scalar('entry_fee')
            ->maxLength('entry_fee', 50)
            ->allowEmpty('entry_fee');

        $validator
            ->scalar('monthly_tax')
            ->maxLength('monthly_tax', 255)
            ->allowEmpty('monthly_tax');

        $validator
            ->allowEmpty('ex_lesson');

        $validator
            ->integer('instructors')
            ->allowEmpty('instructors');

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

        $validator
            ->scalar('image1')
            ->maxLength('image1', 255)
            ->allowEmpty('image1');

        $validator
            ->add('image1_file', 'file', [
                'rule' => ['mimeType', ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']],
                'message' => '拡張子が違います。'
            ])
            ->allowEmpty('image1_file');

        $validator
            ->scalar('image2')
            ->maxLength('image2', 255)
            ->allowEmpty('image2');

        $validator
            ->add('image2_file', 'file', [
                'rule' => ['mimeType', ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']],
                'message' => '拡張子が違います。'
            ])
            ->allowEmpty('image2_file');

        $validator
            ->scalar('image3')
            ->maxLength('image3', 255)
            ->allowEmpty('image3');

        $validator
            ->add('image3_file', 'file', [
                'rule' => ['mimeType', ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']],
                'message' => '拡張子が違います。'
            ])
            ->allowEmpty('image3_file');

        $validator
            ->scalar('introduction')
            ->requirePresence('introduction', 'create')
            ->notEmpty('introduction');

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
    * スタジオ検索 - 都道府県・フリーワード
    *
    * @param array $requests
    */
    public function findBySearch($requests)
    {
        return $this->find('all')
            ->where(['Studios.pref LIKE' => '%' . $requests['pref'] . '%'])
            ->where(['OR' => [
                ['Studios.name LIKE'        => '%' . $requests['word'] . '%'],
                ['Studios.studio_name LIKE' => '%' . $requests['word'] . '%']]])
            ;
    }
}
