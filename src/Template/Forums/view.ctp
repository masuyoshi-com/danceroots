<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forum $forum
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Forum'), ['action' => 'edit', $forum->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Forum'), ['action' => 'delete', $forum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Forums'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Forum'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Forum Comments'), ['controller' => 'ForumComments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Forum Comment'), ['controller' => 'ForumComments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="forums view large-9 medium-8 columns content">
    <h3><?= h($forum->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $forum->has('user') ? $this->Html->link($forum->user->username, ['controller' => 'Users', 'action' => 'view', $forum->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($forum->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($forum->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Youtube') ?></th>
            <td><?= h($forum->youtube) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($forum->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Anonymous Flag') ?></th>
            <td><?= $this->Number->format($forum->anonymous_flag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($forum->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($forum->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($forum->body)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Forum Comments') ?></h4>
        <?php if (!empty($forum->forum_comments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Forum Id') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Anonymous Flag') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($forum->forum_comments as $forumComments): ?>
            <tr>
                <td><?= h($forumComments->id) ?></td>
                <td><?= h($forumComments->user_id) ?></td>
                <td><?= h($forumComments->forum_id) ?></td>
                <td><?= h($forumComments->comment) ?></td>
                <td><?= h($forumComments->anonymous_flag) ?></td>
                <td><?= h($forumComments->created) ?></td>
                <td><?= h($forumComments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ForumComments', 'action' => 'view', $forumComments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ForumComments', 'action' => 'edit', $forumComments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ForumComments', 'action' => 'delete', $forumComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forumComments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
