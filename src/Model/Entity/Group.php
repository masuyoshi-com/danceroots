<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Group Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User[] $users
 */
class Group extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'name'     => true,
        'created'  => true,
        'modified' => true,
        'users'    => true
    ];

    /**
     * ACLに必要なメソッド
     *
     * @return null
     */
    public function parentNode()
    {
        return null;
    }
}
