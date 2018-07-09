<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RecommendVideo Entity
 *
 * @property int    $id
 * @property string $title
 * @property string $youtube
 * @property string $genre
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class RecommendVideo extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'title'    => true,
        'youtube'  => true,
        'genre'    => true,
        'created'  => true,
        'modified' => true
    ];
}
