<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FamousTeamMember Entity
 *
 * @property int    $id
 * @property int    $user_id
 * @property int    $famous_team_id
 * @property string $name
 * @property string $image
 * @property string $profile_url
 * @property int    $leader_flag
 * @property int    $display_order
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\FamousTeam $famous_team
 */
class FamousTeamMember extends Entity
{

    /**
     * アクセスフィールド
     *
     * @var array
     */
    protected $_accessible = [
        'user_id'        => true,
        'famous_team_id' => true,
        'name'           => true,
        'image'          => true,
        'image_file'     => true,
        'profile_url'    => true,
        'leader_flag'    => true,
        'display_order'  => true,
        'created'        => true,
        'modified'       => true,
        'user'           => true,
        'famous_team'    => true
    ];
}
