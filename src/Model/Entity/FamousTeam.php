<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FamousTeam Entity
 *
 * @property int    $id
 * @property int    $user_id
 * @property string $name
 * @property string $icon
 * @property string $image
 * @property string $genre
 * @property string $pref
 * @property string $period
 * @property string $profile
 * @property string $youtube1
 * @property string $youtube2
 * @property string $youtube3
 * @property string $style
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class FamousTeam extends Entity
{

    /**
     * アクセスフィールド
     *
     * @var array
     */
    protected $_accessible = [
        'user_id'    => true,
        'name'       => true,
        'icon'       => true,
        'icon_file'  => true,
        'image'      => true,
        'image_file' => true,
        'genre'      => true,
        'pref'       => true,
        'period'     => true,
        'profile'    => true,
        'youtube1'   => true,
        'youtube2'   => true,
        'youtube3'   => true,
        'style'      => true,
        'created'    => true,
        'modified'   => true,
        'user'       => true,
    ];
}
