<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudioSchedules Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\StudioSchedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\StudioSchedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StudioSchedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StudioSchedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudioSchedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StudioSchedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StudioSchedule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudioSchedulesTable extends Table
{

    const STUDIO_SCHEDULE_IMAGE_PATH = 'upload/studio_schedule/:md5';

    /**
     * 初期化
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('studio_schedules');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Xety/Cake3Upload.Upload', [
            'fields' => [
                'image' => [
                    'path'   => self::STUDIO_SCHEDULE_IMAGE_PATH,
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->add('name', 'custom', [
                'rule'     => 'isSpace',
                'provider' => 'custom',
                'message'  => '空白のみは受け付けません。'
            ])
            ->notEmpty('name');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 20)
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        $validator
            ->integer('week')
            ->requirePresence('week', 'create')
            ->notEmpty('week');

        $validator
            ->scalar('start')
            ->maxLength('start', 30)
            ->requirePresence('start', 'create')
            ->notEmpty('start');

        $validator
            ->scalar('time')
            ->maxLength('time', 20)
            ->requirePresence('time', 'create')
            ->notEmpty('time');

        $validator
            ->scalar('image')
            ->maxLength('image', 150)
            ->allowEmpty('image');

        $validator
            ->add('image_file', 'file', [
                'rule' => ['mimeType', ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']],
                'message' => '拡張子が違います。'
            ])
            ->allowEmpty('image_file');

        $validator
            ->scalar('youtube')
            ->maxLength('youtube', 100)
            ->allowEmpty('youtube')
            ->add('youtube', 'valid-url', [
                'rule'    => ['url', true],
                'message' => '正当なURLを入力してください。'
            ])
            ->add('youtube', 'custom', [
                'rule'     => 'isYoutube',
                'provider' => 'custom',
                'message'  => 'YouTube動画ではありません。'
            ]);

        $validator
            ->scalar('profile')
            ->maxLength('profile', 100)
            ->allowEmpty('profile')
            ->add('profile', 'valid-url', [
                'rule'    => ['url', true],
                'message' => '正当なURLを入力してください。'
            ])
            ->add('profile', 'custom', [
                'rule'     => 'isDanceroots',
                'provider' => 'custom',
                'message'  => 'DancerootsのプロフィールURLではありません。'
            ]);

        $validator
            ->scalar('comment')
            ->allowEmpty('comment');
            
        return $validator;
    }

    /**
     * Save時ルールチェッカー
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
     * EndとZoneカラムリクエストデータ作成
     *
     * @param array $requests POSTリクエストデータ
     * @return array $requests end と zone 追加後のリクエストデータ
     */
    public function createEndAndZoneTime($requests)
    {
        $requests['end'] = (int)substr($requests['start'], 0, 2) + 1;

        // time - 1時間の場合
        if ($requests['time'] === '1 hour') {

            // end時間帯を作成 - 選択されたstartが30が含まれる場合
            if (substr($requests['start'], -2) === '30') {
                $requests['end'] = (string)$requests['end'] . ':30';
            } else {
                $requests['end'] = (string)$requests['end'] . ':00';
            }

            // zoneを作成 - 1時間の場合
            if (substr($requests['start'], -2) === '00') {
                $requests['zone'] = (string)substr($requests['start'], 0, 2) . ':30';
            } else {
                $requests['zone'] = (string)(substr($requests['start'], 0, 2) + 1) . ':00';
            }

        // time - 1時間30分の場合
        } else {

            if (substr($requests['start'], -2) === '30') {
                $requests['end'] = (string)($requests['end'] + 1) . ':00';
            } else {
                $requests['end'] = (string)$requests['end'] . ':30';
            }

            // zoneを作成 - 1時間30分の場合
            if (substr($requests['start'], -2) === '00') {
                $zone1 = (string)substr($requests['start'], 0, 2) . ':30';
                $requests['zone'] = $zone1 . ',' . (string)(substr($requests['start'], 0, 2) + 1) . ':00';
            } else {
                $zone2 = (string)(substr($requests['start'], 0, 2) + 1) . ':00';
                $requests['zone'] = $zone2 . ',' . (string)(substr($requests['start'], 0, 2) + 1) . ':30';
            }
        }
        return $requests;
    }


    /**
     * 選択されたstart - zone時間帯に既にスケジュールがないか
     *
     * @param object $studioSchedule
     * @param int $error_count 選択時間帯に既に登録があった場合は1を返す
     */
     public function findByScheduleCount($studioSchedule)
     {
         if ($studioSchedule->time === '1 hour') {
             $error_count = $this->findByUserIdAndWeek($studioSchedule->user_id, $studioSchedule->week)
                 ->where(['OR' => [
                     ['StudioSchedules.start LIKE' => '%' . $studioSchedule->start . '%'],
                     ['StudioSchedules.start LIKE' => '%' . $studioSchedule->zone . '%'],
                     ['StudioSchedules.zone  LIKE' => '%' . $studioSchedule->start . '%']]])
                 ->count();
         } else {
             $zones = explode(',', $studioSchedule->zone);
             $error_count = $this->findByUserIdAndWeek($studioSchedule->user_id, $studioSchedule->week)
                 ->where(['OR' => [
                     ['StudioSchedules.start LIKE' => '%' . $studioSchedule->start . '%'],
                     ['StudioSchedules.start LIKE' => '%' . $zones[0] . '%'],
                     ['StudioSchedules.start LIKE' => '%' . $zones[1] . '%'],
                     ['StudioSchedules.zone  LIKE' => '%' . $studioSchedule->start . '%']]])
                 ->count();
         }
        return $error_count;
     }


     /**
      * 選択されたstart - zone時間帯に自分(指定ID)意外に既にスケジュールがないか
      *
      * @param object $studioSchedule
      * @param int $error_count 選択時間帯に既に登録があった場合は1を返す
      */
      public function findByScheduleCountNotID($studioSchedule)
      {
          if ($studioSchedule->time === '1 hour') {
              $error_count = $this->findByUserIdAndWeek($studioSchedule->user_id, $studioSchedule->week)
                  ->where(['StudioSchedules.id IS NOT' => $studioSchedule->id])
                  ->where(['OR' => [
                      ['StudioSchedules.start LIKE' => '%' . $studioSchedule->start . '%'],
                      ['StudioSchedules.start LIKE' => '%' . $studioSchedule->zone . '%'],
                      ['StudioSchedules.zone  LIKE' => '%' . $studioSchedule->start . '%']]])
                  ->count();
          } else {
              $zones = explode(',', $studioSchedule->zone);
              $error_count = $this->findByUserIdAndWeek($studioSchedule->user_id, $studioSchedule->week)
                  ->where(['StudioSchedules.id IS NOT' => $studioSchedule->id])
                  ->where(['OR' => [
                      ['StudioSchedules.start LIKE' => '%' . $studioSchedule->start . '%'],
                      ['StudioSchedules.start LIKE' => '%' . $zones[0] . '%'],
                      ['StudioSchedules.start LIKE' => '%' . $zones[1] . '%'],
                      ['StudioSchedules.zone  LIKE' => '%' . $studioSchedule->start . '%']]])
                  ->count();
          }

         return $error_count;
      }
}
