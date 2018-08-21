<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DanceVideos Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\DanceVideo get($primaryKey, $options = [])
 * @method \App\Model\Entity\DanceVideo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DanceVideo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DanceVideo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DanceVideo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DanceVideo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DanceVideo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DanceVideosTable extends Table
{

    /**
     * 初期化
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('dance_videos');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

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
            ->scalar('youtube')
            ->maxLength('youtube', 255)
            ->requirePresence('youtube', 'create')
            ->notEmpty('youtube')
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
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->allowEmpty('comment')
            ->add('comment', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ]);

        $validator
            ->scalar('genre')
            ->maxLength('genre', 50)
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        $validator
            ->scalar('tag')
            ->maxLength('tag', 50)
            ->allowEmpty('tag');

        $validator
            ->integer('good')
            ->allowEmpty('good');

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
    * ダンス動画検索 - ジャンル・フリーワード
    *
    * @param array $requests
    */
    public function findBySearch($requests)
    {
        return $this->find('all')
            ->where(['DanceVideos.genre LIKE' => '%' . $requests['genre'] . '%'])
            ->where(['OR' => [
                ['DanceVideos.title LIKE' => '%' . $requests['word'] . '%'],
                ['Users.username LIKE'    => '%' . $requests['word'] . '%'],
                ['DanceVideos.tag LIKE'   => '%' . $requests['word'] . '%']]])
            ;
    }
}
