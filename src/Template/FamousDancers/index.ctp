<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousDancer[]|\Cake\Collection\CollectionInterface $famousDancers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Famous Dancer'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="famousDancers index large-9 medium-8 columns content">
    <h3><?= __('Famous Dancers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($famousDancers as $famousDancer): ?>
            <tr>
                <td><?= $this->Number->format($famousDancer->id) ?></td>
                <td><?= h($famousDancer->name) ?></td>
                <td><?= h($famousDancer->created) ?></td>
                <td><?= h($famousDancer->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $famousDancer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $famousDancer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $famousDancer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $famousDancer->id)]) ?>
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
