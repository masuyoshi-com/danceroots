<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Forums Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ForumCommentsTable|\Cake\ORM\Association\HasMany $ForumComments
 *
 * @method \App\Model\Entity\Forum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Forum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Forum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Forum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Forum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Forum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Forum findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ForumsTable extends Table
{

    /**
     * 初期化メソッド
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('forums');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType'   => 'INNER'
        ]);
        $this->hasMany('ForumComments', [
            'foreignKey' => 'forum_id',
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
            ->scalar('category')
            ->maxLength('category', 50)
            ->requirePresence('category', 'create')
            ->notEmpty('category');

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
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->scalar('youtube')
            ->maxLength('youtube', 150)
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
            ->requirePresence('anonymous_flag', 'create')
            ->allowEmpty('anonymous_flag');

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
    * フォーラム検索 - カテゴリ・フリーワード
    *
    * @param array $requests
    */
    public function findBySearch($requests)
    {
        return $this->find('all')
            ->where(['Forums.category LIKE' => '%' . $requests['category'] . '%'])
            ->where(['OR' => [
                ['Users.username LIKE' => '%' . $requests['word'] . '%'],
                ['Forums.title LIKE'   => '%' . $requests['word'] . '%'],
                ['Forums.body LIKE'    => '%' . $requests['word'] . '%']]])
            ;
    }

}
