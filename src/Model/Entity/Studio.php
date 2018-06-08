<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * スタジオエンティティ
 *
 * @property int $id
 * @property int $user_id
 * @property string $studio_name
 * @property string $icon
 * @property string $name
 * @property string $tel
 * @property string $self_intro
 * @property string $pref
 * @property string $address
 * @property string $station
 * @property string $url
 * @property \Cake\I18n\FrozenDate $establishment
 * @property string $bussines_hours
 * @property string $entry_fee
 * @property string $monthly_tax
 * @property int $ex_lesson
 * @property int $instructors
 * @property string $youtube
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $introduction
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
        'user_id' => true,
        'studio_name' => true,
        'icon' => true,
        'name' => true,
        'icon_file' => true,
        'tel' => true,
        'self_intro' => true,
        'pref' => true,
        'address' => true,
        'station' => true,
        'url' => true,
        'establishment' => true,
        'bussines_hours' => true,
        'entry_fee' => true,
        'monthly_tax' => true,
        'ex_lesson' => true,
        'instructors' => true,
        'youtube' => true,
        'facebook' => true,
        'twitter' => true,
        'instagram' => true,
        'image1' => true,
        'image1_file' => true,
        'image2' => true,
        'image2_file' => true,
        'image3' => true,
        'image3_file' => true,
        'introduction' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
