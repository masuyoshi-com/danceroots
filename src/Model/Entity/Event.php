<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $event_name
 * @property string $intro
 * @property string $category
 * @property string $image
 * @property string $youtube
 * @property \Cake\I18n\FrozenDate $event_date
 * @property string $start
 * @property string $end
 * @property string $pref
 * @property string $address
 * @property string $place
 * @property string $entry
 * @property int $recruit_flg
 * @property string $entry_fee
 * @property string $guest
 * @property string $event_detail
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\EventEntry[] $event_entries
 * @property \App\Model\Entity\EventReply[] $event_replies
 */
class Event extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'user_id'       => true,
        'event_name'    => true,
        'intro'         => true,
        'category'      => true,
        'image'         => true,
        'image_file'    => true,
        'youtube'       => true,
        'event_date'    => true,
        'start'         => true,
        'end'           => true,
        'pref'          => true,
        'address'       => true,
        'place'         => true,
        'entry'         => true,
        'recruit_flg'   => true,
        'entry_fee'     => true,
        'guest'         => true,
        'event_detail'  => true,
        'created'       => true,
        'modified'      => true,
        'user'          => true,
        'event_entries' => true,
        'event_replies' => true
    ];
}
