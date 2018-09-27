<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Forum Entity
 *
 * @property int    $id
 * @property int    $user_id
 * @property string $category
 * @property string $title
 * @property string $body
 * @property string $youtube
 * @property int $anonymous_flag
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ForumComment[] $forum_comments
 */
class Forum extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        'user_id'        => true,
        'category'       => true,
        'title'          => true,
        'body'           => true,
        'youtube'        => true,
        'anonymous_flag' => true,
        'created'        => true,
        'modified'       => true,
        'user'           => true,
        'forum_comments' => true
    ];
}
