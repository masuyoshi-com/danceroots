<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ForumComment[]|\Cake\Collection\CollectionInterface $forumComments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Forum Comment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Forums'), ['controller' => 'Forums', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Forum'), ['controller' => 'Forums', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="forumComments index large-9 medium-8 columns content">
    <h3><?= __('Forum Comments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('forum_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('anonymous_flag') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($forumComments as $forumComment): ?>
            <tr>
                <td><?= $this->Number->format($forumComment->id) ?></td>
                <td><?= $forumComment->has('user') ? $this->Html->link($forumComment->user->username, ['controller' => 'Users', 'action' => 'view', $forumComment->user->id]) : '' ?></td>
                <td><?= $forumComment->has('forum') ? $this->Html->link($forumComment->forum->title, ['controller' => 'Forums', 'action' => 'view', $forumComment->forum->id]) : '' ?></td>
                <td><?= $this->Number->format($forumComment->anonymous_flag) ?></td>
                <td><?= h($forumComment->created) ?></td>
                <td><?= h($forumComment->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $forumComment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $forumComment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $forumComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forumComment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
