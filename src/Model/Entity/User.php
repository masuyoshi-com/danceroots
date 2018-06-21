<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * ユーザーエンティティ
 *
 * @property int    $id
 * @property int    $group_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int    $classification
 * @property int    $register_flag
 * @property string $tmp_hash
 * @property string $tmp_email
 * @property int    $injustice_count
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CircleGroup[] $circle_groups
 * @property \App\Model\Entity\Circle[]      $circles
 * @property \App\Model\Entity\DanceMovie[]  $dance_movies
 * @property \App\Model\Entity\DanceMusic[]  $dance_musics
 * @property \App\Model\Entity\DanceVideo[]  $dance_videos
 * @property \App\Model\Entity\Dancer[]      $dancers
 * @property \App\Model\Entity\EventEntry[]  $event_entries
 * @property \App\Model\Entity\Event[]       $events
 * @property \App\Model\Entity\Feedback[]    $feedbacks
 * @property \App\Model\Entity\General[]     $generals
 * @property \App\Model\Entity\Job[]         $jobs
 * @property \App\Model\Entity\Message[]     $messages
 * @property \App\Model\Entity\Organizer[]   $organizers
 * @property \App\Model\Entity\Report[]      $reports
 * @property \App\Model\Entity\Studio[]      $studios
 * @property \App\Model\Entity\TeamGroup[]   $team_groups
 * @property \App\Model\Entity\Team[]        $teams
 */
class User extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'group_id'        => true,
        'username'        => true,
        'email'           => true,
        'password'        => true,
        'classification'  => true,
        'register_flag'   => true,
        'tmp_hash'        => true,
        'tmp_email'       => true,
        'injustice_count' => true,
        'created'         => true,
        'modified'        => true,
        'circle_groups'   => true,
        'circles'         => true,
        'dance_movies'    => true,
        'dance_musics'    => true,
        'dance_videos'    => true,
        'dancers'         => true,
        'event_entries'   => true,
        'events'          => true,
        'feedbacks'       => true,
        'generals'        => true,
        'jobs'            => true,
        'messages'        => true,
        'organizers'      => true,
        'reports'         => true,
        'studios'         => true,
        'team_groups'     => true,
        'teams'           => true,
        'groups'          => true
    ];


    /**
     * エンティティのJSONバージョンから除外されるフィールド
     * @var array
     */
    protected $_hidden = [
        'password'
    ];


    /**
    * パスワードハッシュ化
    *
    * @param string $password
    * @return string ハッシュ化されたパスワード
    */
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
    }


    /**
     * ACLに必要なメソッド
     *
     * @return null | array GroupモデルID
     */
    public function parentNode()
    {
        if (!$this->id) {
            return null;
        }
        if (isset($this->group_id)) {
            $group_id = $this->group_id;
        } else {
            $users_table = TableRegistry::get('Users');
            $user        = $users_table->find('all', ['fields' => ['group_id']])->where(['id' => $this->id])->first();
            $group_id    = $user->group_id;
        }
        if (!$group_id) {
            return null;
        }
        return ['Groups' => ['id' => $group_id]];
    }


    /**
     * ACLに必要なメソッド
     *
     * @param  array $user ユーザグループID
     * @return array
     */
    public function bindNode($user)
    {
        return ['model' => 'Groups', 'foreign_key' => $user['Users']['group_id']];
    }

}
