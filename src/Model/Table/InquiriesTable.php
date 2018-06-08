<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * お問い合わせテーブル
 *
 * @method \App\Model\Entity\Inquiry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inquiry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inquiry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inquiry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inquiry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inquiry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inquiry findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InquiriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('inquiries');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }


    /**
     * バリデート
     *
     * @param \Cake\Validation\Validator $validator
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->email('email')
            ->maxLength('email', 150)
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('subject')
            ->maxLength('subject', 255)
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmpty('message');

        return $validator;
    }


}
