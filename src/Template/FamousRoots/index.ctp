<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousRoot[]|\Cake\Collection\CollectionInterface $famousRoots
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Famous Root'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="famousRoots index large-9 medium-8 columns content">
    <h3><?= __('Famous Roots') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('youtube') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($famousRoots as $famousRoot): ?>
            <tr>
                <td><?= $this->Number->format($famousRoot->id) ?></td>
                <td><?= $famousRoot->has('user') ? $this->Html->link($famousRoot->user->username, ['controller' => 'Users', 'action' => 'view', $famousRoot->user->id]) : '' ?></td>
                <td><?= h($famousRoot->title) ?></td>
                <td><?= $this->Number->format($famousRoot->year) ?></td>
                <td><?= h($famousRoot->youtube) ?></td>
                <td><?= h($famousRoot->created) ?></td>
                <td><?= h($famousRoot->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $famousRoot->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $famousRoot->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $famousRoot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $famousRoot->id)]) ?>
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
