<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $intro
 * @property string $work_detail
 * @property string $image
 * @property string $category
 * @property string $genre
 * @property string $pref
 * @property string $city
 * @property string $station
 * @property string $q_required
 * @property string $question
 * @property string $compensation
 * @property string $working_time
 * @property int $people
 * @property string $etc
 * @property int $public_flag
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\JobReply[] $job_replies
 */
class Job extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'user_id'      => true,
        'title'        => true,
        'intro'        => true,
        'work_detail'  => true,
        'image'        => true,
        'image_file'   => true,
        'category'     => true,
        'genre'        => true,
        'pref'         => true,
        'city'         => true,
        'station'      => true,
        'q_required'   => true,
        'question'     => true,
        'compensation' => true,
        'working_time' => true,
        'people'       => true,
        'etc'          => true,
        'public_flag'  => true,
        'created'      => true,
        'modified'     => true,
        'user'         => true,
        'job_replies'  => true
    ];
}
