<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DanceVideo Entity
 *
 * @property int    $id
 * @property int    $user_id
 * @property string $title
 * @property string $youtube
 * @property string $genre
 * @property string $tag
 * @property string $year
 * @property int    $good
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class DanceVideo extends Entity
{
    /**
     * @var array
     */
    protected $_accessible = [
        'user_id'  => true,
        'title'    => true,
        'youtube'  => true,
        'genre'    => true,
        'tag'      => true,
        'year'     => true,
        'good'     => true,
        'created'  => true,
        'modified' => true,
        'user'     => true
    ];
}
