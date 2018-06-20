<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CircleMessages Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CirclesTable|\Cake\ORM\Association\BelongsTo $Circles
 *
 * @method \App\Model\Entity\CircleMessage get($primaryKey, $options = [])
 * @method \App\Model\Entity\CircleMessage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CircleMessage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CircleMessage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CircleMessage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CircleMessage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CircleMessage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CircleMessagesTable extends Table
{
    /**
     * 初期
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('circle_messages');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType'   => 'INNER'
        ]);

        $this->belongsTo('Circles', [
            'foreignKey' => 'circle_id',
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
        $rules->add($rules->existsIn(['circle_id'], 'Circles'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }


    /**
    * サークルメッセージ検索 - フリーワード
    *
    * @param int   $circle_id サークルID
    * @param array $requests  GETクエリーリクエスト
    */
    public function findBySearch($circle_id, $requests)
    {
        return $this->find('all')
            ->where(['CircleMessages.circle_id' => $circle_id])
            ->where(['OR' => [
                ['Users.username LIKE'       => '%' . $requests['word'] . '%'],
                ['CircleMessages.title LIKE' => '%' . $requests['word'] . '%'],
                ['CircleMessages.body LIKE'  => '%' . $requests['word'] . '%']]])
            ;
    }
}
