<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FamousDancers Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Users
 * @property |\Cake\ORM\Association\HasMany $FamousDancerArtists
 * @property |\Cake\ORM\Association\HasMany $FamousDancerEvents
 * @property |\Cake\ORM\Association\HasMany $FamousDancerRoots
 *
 * @method \App\Model\Entity\FamousDancer get($primaryKey, $options = [])
 * @method \App\Model\Entity\FamousDancer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FamousDancer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FamousDancer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FamousDancer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FamousDancer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FamousDancer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FamousDancersTable extends Table
{
    const FAMOUS_DANCER_IMAGE_PATH = 'upload/famous_dancer/:md5';

    /**
     * 初期化メソッド
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('famous_dancers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'icon' => [
                    'path'   => self::FAMOUS_DANCER_IMAGE_PATH,
                    'prefix' => '../'
                ],
                'image' => [
                    'path'   => self::FAMOUS_DANCER_IMAGE_PATH,
                    'prefix' => '../'
                ]
            ]
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType'   => 'INNER'
        ]);
        $this->hasMany('FamousDancerArtists', [
            'foreignKey' => 'famous_dancer_id'
        ]);
        $this->hasMany('FamousDancerEvents', [
            'foreignKey' => 'famous_dancer_id'
        ]);
        $this->hasMany('FamousDancerRoots', [
            'foreignKey' => 'famous_dancer_id'
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
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('icon')
            ->maxLength('icon', 255)
            ->allowEmpty('icon');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmpty('image');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 20)
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        $validator
            ->scalar('profile')
            ->requirePresence('profile', 'create')
            ->notEmpty('profile');

        $validator
            ->scalar('iv_trigger')
            ->allowEmpty('iv_trigger');

        $validator
            ->scalar('iv_inspire')
            ->allowEmpty('iv_inspire');

        $validator
            ->scalar('iv_dancer')
            ->allowEmpty('iv_dancer');

        $validator
            ->scalar('iv_instructor')
            ->allowEmpty('iv_instructor');

        $validator
            ->scalar('iv_advice')
            ->allowEmpty('iv_advice');

        $validator
            ->scalar('youtube1')
            ->maxLength('youtube1', 255)
            ->allowEmpty('youtube1');

        $validator
            ->scalar('youtube2')
            ->maxLength('youtube2', 255)
            ->allowEmpty('youtube2');

        $validator
            ->scalar('youtube3')
            ->maxLength('youtube3', 255)
            ->allowEmpty('youtube3');

        $validator
            ->scalar('sche_sun')
            ->allowEmpty('sche_sun');

        $validator
            ->scalar('sche_mon')
            ->allowEmpty('sche_mon');

        $validator
            ->scalar('sche_tue')
            ->allowEmpty('sche_tue');

        $validator
            ->scalar('sche_wed')
            ->allowEmpty('sche_wed');

        $validator
            ->scalar('sche_thu')
            ->allowEmpty('sche_thu');

        $validator
            ->scalar('sche_fri')
            ->allowEmpty('sche_fri');

        $validator
            ->scalar('sche_sat')
            ->allowEmpty('sche_sat');

        $validator
            ->scalar('facebook')
            ->maxLength('facebook', 255)
            ->allowEmpty('facebook');

        $validator
            ->scalar('twitter')
            ->maxLength('twitter', 255)
            ->allowEmpty('twitter');

        $validator
            ->scalar('instagram')
            ->maxLength('instagram', 255)
            ->allowEmpty('instagram');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
