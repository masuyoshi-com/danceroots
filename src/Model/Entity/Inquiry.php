<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * お問い合わせエンティティ
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Inquiry extends Entity
{
    /**
     * @var array
     */
    protected $_accessible = [
        'name'     => true,
        'email'    => true,
        'subject'  => true,
        'message'  => true,
        'created'  => true,
        'modified' => true
    ];
    
}
