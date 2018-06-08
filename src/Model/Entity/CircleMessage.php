<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CircleMessage Entity
 *
 * @property int    $id
 * @property int    $circle_id
 * @property int    $user_id
 * @property string $title
 * @property string $body
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $notice 編集の際お知らせ通知するか
 * 
 * @property \App\Model\Entity\Circle $circle
 */
class CircleMessage extends Entity
{

    /**
     * patchEntity()などの実行の際でのアクセス権限
     *
     * @var array
     */
    protected $_accessible = [
        'circle_id' => true,
        'user_id'   => true,
        'title'     => true,
        'body'      => true,
        'created'   => true,
        'modified'  => true,
        'circle'    => true,
        'notice'    => true
    ];
}
