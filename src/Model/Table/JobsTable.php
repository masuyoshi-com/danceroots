<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\JobRepliesTable|\Cake\ORM\Association\HasMany $JobReplies
 *
 * @method \App\Model\Entity\Job get($primaryKey, $options = [])
 * @method \App\Model\Entity\Job newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Job[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Job|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Job patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Job[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Job findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \vendor\xety\cake3-upload
 */
class JobsTable extends Table
{
    const JOB_IMAGE_PATH = 'upload/job/:md5';

    /**
     * 初期化
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('jobs');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'image' => [
                    'path'   => self::JOB_IMAGE_PATH,
                    'prefix' => '../'
                ]
            ]
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType'   => 'INNER'
        ]);
        $this->hasMany('JobReplies', [
            'foreignKey' => 'job_id'
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
            ->scalar('work_detail')
            ->requirePresence('work_detail', 'create')
            ->notEmpty('work_detail');

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
            ->scalar('category')
            ->maxLength('category', 100)
            ->requirePresence('category', 'create')
            ->notEmpty('category');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 100)
            ->allowEmpty('genre');

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
            ->scalar('station')
            ->maxLength('station', 100)
            ->requirePresence('station', 'create')
            ->notEmpty('station')
            ->add('station', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('q_required')
            ->maxLength('q_required', 255)
            ->requirePresence('q_required', 'create')
            ->notEmpty('q_required')
            ->add('q_required', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('question')
            ->allowEmpty('question');

        $validator
            ->scalar('compensation')
            ->maxLength('compensation', 255)
            ->requirePresence('compensation', 'create')
            ->notEmpty('compensation')
            ->add('compensation', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('working_time')
            ->maxLength('working_time', 150)
            ->requirePresence('working_time', 'create')
            ->notEmpty('working_time')
            ->add('working_time', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->integer('people')
            ->requirePresence('people', 'create')
            ->notEmpty('people');

        $validator
            ->scalar('etc')
            ->allowEmpty('etc');

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
    * ダンス関連求人検索 - 都道府県・カテゴリ・フリーワード
    *  public_flagが0(公開)のみ取得
    *
    * @param array $requests
    * @return object SQLQuery
    */
    public function findBySearch($requests)
    {
        return $this->find('all')
            ->where(['Jobs.pref LIKE'     => '%' . $requests['pref'] . '%'])
            ->where(['Jobs.category LIKE' => '%' . $requests['category'] . '%'])
            ->where(['OR' => [
                ['Jobs.title LIKE'   => '%' . $requests['word'] . '%'],
                ['Jobs.city LIKE'    => '%' . $requests['word'] . '%'],
                ['Jobs.station LIKE' => '%' . $requests['word'] . '%']]])
            ->andWhere(['Jobs.public_flag' => 0])
            ;
    }

}
