<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $to_user_id
 * @property string $title
 * @property string $body
 * @property int $read_flag
 * @property int $reply_id
 * @property int $reply_flag
 * @property int $from_del_flag 差出人削除フラグ
 * @property int $to_del_flag   受取人削除フラグ
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Message extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'user_id'       => true,
        'to_user_id'    => true,
        'title'         => true,
        'body'          => true,
        'read_flag'     => true,
        'reply_id'      => true,
        'reply_flag'    => true,
        'from_del_flag' => true,
        'to_del_flag'   => true,
        'created'       => true,
        'modified'      => true,
        'url'           => true,
        'to_user'       => true,
        'user'          => true,
    ];
}
