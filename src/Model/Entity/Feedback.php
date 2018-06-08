<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Feedback Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $subject
 * @property string $body
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Feedback extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'user_id'  => true,
        'subject'  => true,
        'body'     => true,
        'created'  => true,
        'modified' => true,
        'user'     => true
    ];
}
