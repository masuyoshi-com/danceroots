<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * スタジオエンティティ
 *
 * @property int    $id
 * @property int    $user_id
 * @property string $studio_name
 * @property string $icon
 * @property string $name
 * @property string $main_genre
 * @property string $tel
 * @property string $self_intro
 * @property string $pref
 * @property string $city
 * @property string $address
 * @property string $access
 * @property string $station
 * @property string $url
 * @property string $establishment
 * @property string $bussines_hours
 * @property string $entry_fee
 * @property string $monthly_tax
 * @property int    $ex_lesson
 * @property string $campaign
 * @property int    $instructors
 * @property string $genre
 * @property string $youtube
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $introduction
 * @property int    $public_flag
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Studio extends Entity
{

    /**
     * アクセス許可
     *
     * @var array
     */
    protected $_accessible = [
        'user_id'        => true,
        'studio_name'    => true,
        'icon'           => true,
        'icon_file'      => true,
        'name'           => true,
        'main_genre'     => true,
        'tel'            => true,
        'self_intro'     => true,
        'pref'           => true,
        'city'           => true,
        'address'        => true,
        'access'         => true,
        'station'        => true,
        'url'            => true,
        'establishment'  => true,
        'bussines_hours' => true,
        'entry_fee'      => true,
        'monthly_tax'    => true,
        'ex_lesson'      => true,
        'campaign'       => true,
        'instructors'    => true,
        'genre'          => true,
        'youtube'        => true,
        'facebook'       => true,
        'twitter'        => true,
        'instagram'      => true,
        'image1'         => true,
        'image1_file'    => true,
        'image2'         => true,
        'image2_file'    => true,
        'image3'         => true,
        'image3_file'    => true,
        'introduction'   => true,
        'public_flag'    => true,
        'created'        => true,
        'modified'       => true,
        'user'           => true
    ];
}
