<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudioSchedule Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $genre
 * @property int $week
 * @property string $start
 * @property string $end
 * @property string $image
 * @property string $youtube
 * @property string $profile
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class StudioSchedule extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'name' => true,
        'genre' => true,
        'week' => true,
        'start' => true,
        'end' => true,
        'image' => true,
        'youtube' => true,
        'profile' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
