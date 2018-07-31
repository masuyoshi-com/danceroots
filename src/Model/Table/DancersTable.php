<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ダンサーモデル
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Dancer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dancer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dancer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dancer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dancer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dancer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dancer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \vendor\xety\cake3-upload
 */
class DancersTable extends Table
{
    // Xetyバグ - 新規作成時:idプレースフォルダは使用できない
    const DANCER_IMAGE_PATH = 'upload/dancer/:md5';

    /**
     * 初期化メソッド
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('dancers');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'icon' => [
                    'path'   => self::DANCER_IMAGE_PATH,
                    'prefix' => '../' // imgディレクトリを使用したくない場合prefix要素必要
                ],
                'image1' => [
                    'path'   => self::DANCER_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image2' => [
                    'path'   => self::DANCER_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image3' => [
                    'path'   => self::DANCER_IMAGE_PATH,
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
            ->scalar('team_name')
            ->maxLength('team_name', 150)
            ->allowEmpty('team_name');

        $validator
            ->integer('age')
            ->maxLength('age', 2)
            ->allowEmpty('age');

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
            ->scalar('genre')
            ->maxLength('genre', 100)
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        $validator
            ->scalar('pref')
            ->maxLength('pref', 50)
            ->requirePresence('pref', 'create')
            ->notEmpty('pref');

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
            ->integer('career')
            ->maxLength('career', 2)
            ->requirePresence('career', 'create')
            ->notEmpty('career');

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
                'message'  => 'Youtube動画ではありません。'
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
                'message'  => 'Youtube動画ではありません。'
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
                'message'  => 'Youtube動画ではありません。'
            ]);

        $validator
            ->scalar('history')
            ->requirePresence('history', 'create')
            ->notEmpty('history')
            ->add('history', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('practice_place')
            ->maxLength('practice_place', 150)
            ->allowEmpty('practice_place');

        $validator
            ->scalar('favorite_brand')
            ->maxLength('favorite_brand', 255)
            ->allowEmpty('favorite_brand');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->allowEmpty('url');

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
            ->scalar('respect_dancer')
            ->maxLength('respect_dancer', 150)
            ->allowEmpty('respect_dancer');

        $validator
            ->scalar('favorite_artist')
            ->maxLength('favorite_artist', 255)
            ->allowEmpty('favorite_artist');

        $validator
            ->scalar('plan')
            ->allowEmpty('plan');

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
    * ダンサー検索 - 都道府県・ジャンル・フリーワード
    *
    * @param array $requests
    */
    public function findBySearch($requests)
    {
        return $this->find('all')
            ->where(['Dancers.pref LIKE'  => '%' . $requests['pref'] . '%'])
            ->where(['Dancers.genre LIKE' => '%' . $requests['genre'] . '%'])
            ->where(['OR' => [
                ['Users.username LIKE'    => '%' . $requests['word'] . '%'],
                ['Dancers.team_name LIKE' => '%' . $requests['word'] . '%']]])
            ;
    }


    /**
    * 一般公開用ダンサー検索 - 都道府県・ジャンル・フリーワード
    * 0: 一般公開する 1:公開しない
    *
    * @param array $requests
    */
    public function findBySearchForPublic($requests)
    {
        return $this->find('all')
            ->where(['Dancers.pref LIKE'  => '%' . $requests['pref'] . '%'])
            ->where(['Dancers.genre LIKE' => '%' . $requests['genre'] . '%'])
            ->where(['OR' => [
                ['Users.username LIKE'    => '%' . $requests['word'] . '%'],
                ['Dancers.team_name LIKE' => '%' . $requests['word'] . '%']]])
            ->andWhere(['Dancers.public_flag' => 0])
            ;
    }
}
