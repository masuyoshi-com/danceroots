<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * General Entity
 *
 * @property int    $id
 * @property int    $user_id
 * @property string $pref
 * @property string $icon
 * @property string $self_intro
 * @property string $favorite_genre
 * @property string $favorite_dancer
 * @property string $favorite_artist
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property string $notes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class General extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'user_id'         => true,
        'pref'            => true,
        'icon'            => true,
        'icon_file'       => true,
        'self_intro'      => true,
        'favorite_genre'  => true,
        'favorite_dancer' => true,
        'favorite_artist' => true,
        'facebook'        => true,
        'twitter'         => true,
        'instagram'       => true,
        'notes'           => true,
        'created'         => true,
        'modified'        => true,
        'user'            => true
    ];
}
