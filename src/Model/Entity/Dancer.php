<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ダンサーエンティティ
 *
 * @property int    $id
 * @property int    $user_id
 * @property string $team_name
 * @property int    $age
 * @property string $icon
 * @property string $genre
 * @property string $pref
 * @property string $self_intro
 * @property int    $career
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $youtube1
 * @property string $youtube2
 * @property string $youtube3
 * @property string $history
 * @property string $practice_place
 * @property string $favorite_brand
 * @property string $url
 * @property string $twitter
 * @property string $facebook
 * @property string $instagram
 * @property string $respect_dancer
 * @property string $favorite_artist
 * @property string $plan
 * @property int    $offer_flag
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Dancer extends Entity
{

    /**
     * アクセスフィールド
     *
     * @var array
     */
    protected $_accessible = [
        'user_id'         => true,
        'team_name'       => true,
        'age'             => true,
        'icon'            => true,
        'icon_file'       => true,
        'genre'           => true,
        'pref'            => true,
        'self_intro'      => true,
        'career'          => true,
        'image1'          => true,
        'image1_file'     => true,
        'image2'          => true,
        'image2_file'     => true,
        'image3'          => true,
        'image3_file'     => true,
        'youtube1'        => true,
        'youtube2'        => true,
        'youtube3'        => true,
        'history'         => true,
        'practice_place'  => true,
        'favorite_brand'  => true,
        'url'             => true,
        'twitter'         => true,
        'facebook'        => true,
        'instagram'       => true,
        'respect_dancer'  => true,
        'favorite_artist' => true,
        'plan'            => true,
        'offer_flag'      => true,
        'created'         => true,
        'modified'        => true,
        'user'            => true
    ];
}
