<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Artist Entity
 *
 * @property int   $id
 * @property string $name
 * @property string $genre
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Artist extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'name'     => true,
        'genre'    => true,
        'created'  => true,
        'modified' => true
    ];
}
