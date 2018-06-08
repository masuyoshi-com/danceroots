<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Circle Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $pref
 * @property string $city
 * @property string $title
 * @property string $intro
 * @property string $place
 * @property string $distinction
 * @property string $name
 * @property string $circle_detail
 * @property string $image
 * @property string $genre
 * @property string $station
 * @property string $age
 * @property string $conditions
 * @property string $purpose
 * @property int $public_flag
 * @property int $delete_flag
 * @property string $delete_reason
 *
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\CircleGroup[] $circle_groups
 */
class Circle extends Entity
{
    /**
     * @var array
     */
    protected $_accessible = [
        'user_id'       => true,
        'pref'          => true,
        'city'          => true,
        'title'         => true,
        'intro'         => true,
        'place'         => true,
        'distinction'   => true,
        'name'          => true,
        'circle_detail' => true,
        'image'         => true,
        'image_file'    => true,
        'genre'         => true,
        'station'       => true,
        'age'           => true,
        'conditions'    => true,
        'purpose'       => true,
        'public_flag'   => true,
        'delete_flag'   => true,
        'delete_reason' => true,
        'created'       => true,
        'modified'      => true,
        'user'          => true,
        'circle_groups' => true
    ];
}
