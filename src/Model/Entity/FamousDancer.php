<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FamousDancer Entity
 *
 * @property int    $id
 * @property int    $user_id
 * @property string $name
 * @property string $icon
 * @property string $image
 * @property string $genre
 * @property string $profile
 * @property string $iv_trigger
 * @property string $iv_inspire
 * @property string $iv_dancer
 * @property string $iv_instructor
 * @property string $iv_advice
 * @property string $youtube1
 * @property string $youtube2
 * @property string $youtube3
 * @property string $sche_sun
 * @property string $sche_mon
 * @property string $sche_tue
 * @property string $sche_wed
 * @property string $sche_thu
 * @property string $sche_fri
 * @property string $sche_sat
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class FamousDancer extends Entity
{

    /**
     * アクセスフィールド
     * @var array
     */
    protected $_accessible = [
        'user_id'       => true,
        'name'          => true,
        'icon'          => true,
        'icon_file'     => true,
        'image'         => true,
        'image_file'    => true,
        'genre'         => true,
        'profile'       => true,
        'iv_trigger'    => true,
        'iv_inspire'    => true,
        'iv_dancer'     => true,
        'iv_instructor' => true,
        'iv_advice'     => true,
        'youtube1'      => true,
        'youtube2'      => true,
        'youtube3'      => true,
        'sche_sun'      => true,
        'sche_mon'      => true,
        'sche_tue'      => true,
        'sche_wed'      => true,
        'sche_thu'      => true,
        'sche_fri'      => true,
        'sche_sat'      => true,
        'facebook'      => true,
        'twitter'       => true,
        'instagram'     => true,
        'created'       => true,
        'modified'      => true,
        'user'          => true,
    ];
}
