<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FamousRoot Entity
 *
 * @property int    $id
 * @property int    $user_id
 * @property string $title
 * @property int    $year
 * @property string $body
 * @property string $youtube
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class FamousRoot extends Entity
{

    /**
     * アクセスフィールド
     *
     * @var array
     */
    protected $_accessible = [
        'user_id'  => true,
        'title'    => true,
        'year'     => true,
        'body'     => true,
        'youtube'  => true,
        'created'  => true,
        'modified' => true,
        'user'     => true
    ];
}
