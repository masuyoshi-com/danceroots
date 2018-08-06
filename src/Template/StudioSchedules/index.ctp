<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudioSchedule[]|\Cake\Collection\CollectionInterface $studioSchedules
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Studio Schedule'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="studioSchedules index large-9 medium-8 columns content">
    <h3><?= __('Studio Schedules') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('genre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('week') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('youtube') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studioSchedules as $studioSchedule): ?>
            <tr>
                <td><?= $this->Number->format($studioSchedule->id) ?></td>
                <td><?= $studioSchedule->has('user') ? $this->Html->link($studioSchedule->user->username, ['controller' => 'Users', 'action' => 'view', $studioSchedule->user->id]) : '' ?></td>
                <td><?= h($studioSchedule->name) ?></td>
                <td><?= h($studioSchedule->genre) ?></td>
                <td><?= $this->Number->format($studioSchedule->week) ?></td>
                <td><?= h($studioSchedule->start) ?></td>
                <td><?= h($studioSchedule->end) ?></td>
                <td><?= h($studioSchedule->image) ?></td>
                <td><?= h($studioSchedule->youtube) ?></td>
                <td><?= h($studioSchedule->profile) ?></td>
                <td><?= h($studioSchedule->created) ?></td>
                <td><?= h($studioSchedule->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $studioSchedule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studioSchedule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studioSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studioSchedule->id)]) ?>
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
