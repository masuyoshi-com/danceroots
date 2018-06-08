<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Organizer Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $icon
 * @property string $company
 * @property string $pref
 * @property string $city
 * @property string $url
 * @property string $self_intro
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property string $organaized
 * @property string $youtube
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $introduction
 * @property string $plan
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Organizer extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'icon' => true,
        'icon_file' => true,
        'company' => true,
        'pref' => true,
        'city' => true,
        'url' => true,
        'self_intro' => true,
        'facebook' => true,
        'twitter' => true,
        'instagram' => true,
        'organaized' => true,
        'youtube' => true,
        'image1' => true,
        'image1_file' => true,
        'image2' => true,
        'image2_file' => true,
        'image3' => true,
        'image3_file' => true,
        'introduction' => true,
        'plan' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
