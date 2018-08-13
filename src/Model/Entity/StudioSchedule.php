<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudioSchedule Entity
 *
 * @property int    $id
 * @property int    $user_id
 * @property string $name
 * @property string $team
 * @property string $genre
 * @property string $difficulty
 * @property int    $week
 * @property string $start
 * @property string $zone
 * @property string $end
 * @property string $time
 * @property string $image
 * @property string $image_file
 * @property string $youtube
 * @property string $profile
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class StudioSchedule extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'user_id'    => true,
        'name'       => true,
        'team'       => true,
        'difficulty' => true,
        'genre'      => true,
        'week'       => true,
        'start'      => true,
        'zone'       => true,
        'end'        => true,
        'time'       => true,
        'image'      => true,
        'image_file' => true,
        'youtube'    => true,
        'profile'    => true,
        'comment'    => true,
        'created'    => true,
        'modified'   => true,
        'user'       => true
    ];
}
