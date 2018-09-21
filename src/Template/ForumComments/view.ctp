<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ForumComment $forumComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Forum Comment'), ['action' => 'edit', $forumComment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Forum Comment'), ['action' => 'delete', $forumComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forumComment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Forum Comments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Forum Comment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Forums'), ['controller' => 'Forums', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Forum'), ['controller' => 'Forums', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="forumComments view large-9 medium-8 columns content">
    <h3><?= h($forumComment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $forumComment->has('user') ? $this->Html->link($forumComment->user->username, ['controller' => 'Users', 'action' => 'view', $forumComment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Forum') ?></th>
            <td><?= $forumComment->has('forum') ? $this->Html->link($forumComment->forum->title, ['controller' => 'Forums', 'action' => 'view', $forumComment->forum->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($forumComment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Anonymous Flag') ?></th>
            <td><?= $this->Number->format($forumComment->anonymous_flag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($forumComment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($forumComment->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($forumComment->comment)); ?>
    </div>
</div>
