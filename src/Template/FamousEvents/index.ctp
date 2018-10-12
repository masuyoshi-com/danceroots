<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousEvent[]|\Cake\Collection\CollectionInterface $famousEvents
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Famous Event'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="famousEvents index large-9 medium-8 columns content">
    <h3><?= __('Famous Events') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($famousEvents as $famousEvent): ?>
            <tr>
                <td><?= $this->Number->format($famousEvent->id) ?></td>
                <td><?= $famousEvent->has('user') ? $this->Html->link($famousEvent->user->username, ['controller' => 'Users', 'action' => 'view', $famousEvent->user->id]) : '' ?></td>
                <td><?= h($famousEvent->category) ?></td>
                <td><?= h($famousEvent->title) ?></td>
                <td><?= h($famousEvent->image) ?></td>
                <td><?= h($famousEvent->event_date) ?></td>
                <td><?= h($famousEvent->start) ?></td>
                <td><?= h($famousEvent->end) ?></td>
                <td><?= h($famousEvent->created) ?></td>
                <td><?= h($famousEvent->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $famousEvent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $famousEvent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $famousEvent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $famousEvent->id)]) ?>
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
