<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CircleGroup Entity
 *
 * @property int $id
 * @property int $circle_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Circle $circle
 * @property \App\Model\Entity\User $user
 */
class CircleGroup extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'circle_id' => true,
        'user_id'   => true,
        'circle'    => true,
        'user'      => true
    ];
}
