<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FamousEvent Entity
 *
 * @property int    $id
 * @property int    $user_id
 * @property string $category
 * @property string $title
 * @property string $image
 * @property \Cake\I18n\FrozenDate $event_date
 * @property string $start
 * @property string $end
 * @property string $body
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class FamousEvent extends Entity
{

    /**
     * アクセスフィールド
     * @var array
     */
    protected $_accessible = [
        'user_id'    => true,
        'category'   => true,
        'title'      => true,
        'image'      => true,
        'image_file' => true,
        'event_date' => true,
        'start'      => true,
        'end'        => true,
        'body'       => true,
        'created'    => true,
        'modified'   => true,
        'user'       => true,
    ];
}
