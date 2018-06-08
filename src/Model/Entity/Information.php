<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Information Entity
 *
 * @property int    $id
 * @property string $title
 * @property string $body
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Information extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'title'    => true,
        'body'     => true,
        'created'  => true,
        'modified' => true
    ];
}
