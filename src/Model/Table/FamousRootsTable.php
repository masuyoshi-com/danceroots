<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FamousRoots Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\FamousRoot get($primaryKey, $options = [])
 * @method \App\Model\Entity\FamousRoot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FamousRoot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FamousRoot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FamousRoot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FamousRoot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FamousRoot findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FamousRootsTable extends Table
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

        $this->setTable('famous_roots');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->integer('year')
            ->requirePresence('year', 'create')
            ->notEmpty('year');

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
