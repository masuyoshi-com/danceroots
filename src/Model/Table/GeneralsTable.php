<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Generals Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\General get($primaryKey, $options = [])
 * @method \App\Model\Entity\General newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\General[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\General|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\General patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\General[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\General findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \vendor\xety\cake3-upload
 */
class GeneralsTable extends Table
{
    const GENERAL_IMAGE_PATH = 'upload/general/:md5';

    /**
     * 初期化
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('generals');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'icon' => [
                    'path'   => self::GENERAL_IMAGE_PATH,
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
            ->scalar('pref')
            ->maxLength('pref', 50)
            ->notEmpty('pref');

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
            ->scalar('self_intro')
            ->maxLength('self_intro', 255)
            ->notEmpty('self_intro')
            ->add('self_intro', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('favorite_genre')
            ->maxLength('favorite_genre', 100)
            ->allowEmpty('favorite_genre');

        $validator
            ->scalar('favorite_dancer')
            ->maxLength('favorite_dancer', 100)
            ->allowEmpty('favorite_dancer');

        $validator
            ->scalar('favorite_artist')
            ->maxLength('favorite_artist', 100)
            ->allowEmpty('favorite_artist');

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
            ->scalar('notes')
            ->allowEmpty('notes');

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
