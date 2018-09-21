<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forum[]|\Cake\Collection\CollectionInterface $forums
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Forum'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Forum Comments'), ['controller' => 'ForumComments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Forum Comment'), ['controller' => 'ForumComments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="forums index large-9 medium-8 columns content">
    <h3><?= __('Forums') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('youtube') ?></th>
                <th scope="col"><?= $this->Paginator->sort('anonymous_flag') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($forums as $forum): ?>
            <tr>
                <td><?= $this->Number->format($forum->id) ?></td>
                <td><?= $forum->has('user') ? $this->Html->link($forum->user->username, ['controller' => 'Users', 'action' => 'view', $forum->user->id]) : '' ?></td>
                <td><?= h($forum->category) ?></td>
                <td><?= h($forum->title) ?></td>
                <td><?= h($forum->youtube) ?></td>
                <td><?= $this->Number->format($forum->anonymous_flag) ?></td>
                <td><?= h($forum->created) ?></td>
                <td><?= h($forum->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $forum->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $forum->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $forum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id)]) ?>
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
