<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Team Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $youtube
 * @property string $history
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Dancer[] $dancers
 * @property \App\Model\Entity\TeamGroup[] $team_groups
 */
class Team extends Entity
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
        'youtube' => true,
        'history' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'dancers' => true,
        'team_groups' => true
    ];
}
