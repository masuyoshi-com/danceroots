<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Organizers Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Organizer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Organizer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Organizer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Organizer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Organizer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Organizer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Organizer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \vendor\xety\cake3-upload
 */
class OrganizersTable extends Table
{
    const ORGANIZER_IMAGE_PATH = 'upload/organizer/:md5';

    /**
     * 初期化
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('organizers');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'icon' => [
                    'path'   => self::ORGANIZER_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image1' => [
                    'path'   => self::ORGANIZER_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image2' => [
                    'path'   => self::ORGANIZER_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image3' => [
                    'path'   => self::ORGANIZER_IMAGE_PATH,
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
            ->scalar('company')
            ->maxLength('company', 150)
            ->allowEmpty('company');

        $validator
            ->scalar('pref')
            ->maxLength('pref', 50)
            ->requirePresence('pref', 'create')
            ->notEmpty('pref');

        $validator
            ->scalar('city')
            ->maxLength('city', 100)
            ->notEmpty('city');

        $validator
            ->scalar('address')
            ->maxLength('address', 150)
            ->requirePresence('address', 'create')
            ->allowEmpty('address')
            ->add('address', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->allowEmpty('url');

        $validator
            ->scalar('self_intro')
            ->maxLength('self_intro', 255)
            ->requirePresence('self_intro', 'create')
            ->notEmpty('self_intro')
            ->add('self_intro', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
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
            ->scalar('organaized')
            ->allowEmpty('organaized');

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
            ->scalar('image1')
            ->maxLength('image1', 255)
            ->allowEmpty('image1');

        $validator
            ->add('image1_file', 'file', [
                'rule'    => ['mimeType', ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']],
                'message' => '拡張子が違います。'
            ])
            ->allowEmpty('image1_file');

        $validator
            ->scalar('image2')
            ->maxLength('image2', 255)
            ->allowEmpty('image2');

        $validator
            ->add('image2_file', 'file', [
                'rule'    => ['mimeType', ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']],
                'message' => '拡張子が違います。'
            ])
            ->allowEmpty('image2_file');

        $validator
            ->scalar('image3')
            ->maxLength('image3', 255)
            ->allowEmpty('image3');

        $validator
            ->add('image3_file', 'file', [
                'rule'    => ['mimeType', ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']],
                'message' => '拡張子が違います。'
            ])
            ->allowEmpty('image3_file');

        $validator
            ->scalar('introduction')
            ->notEmpty('introduction');

        $validator
            ->scalar('plan')
            ->allowEmpty('plan');

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
