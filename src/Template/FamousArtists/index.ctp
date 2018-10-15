<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousArtist[]|\Cake\Collection\CollectionInterface $famousArtists
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Famous Artist'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="famousArtists index large-9 medium-8 columns content">
    <h3><?= __('Famous Artists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modifed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($famousArtists as $famousArtist): ?>
            <tr>
                <td><?= $this->Number->format($famousArtist->id) ?></td>
                <td><?= $famousArtist->has('user') ? $this->Html->link($famousArtist->user->username, ['controller' => 'Users', 'action' => 'view', $famousArtist->user->id]) : '' ?></td>
                <td><?= h($famousArtist->created) ?></td>
                <td><?= h($famousArtist->modifed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $famousArtist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $famousArtist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $famousArtist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $famousArtist->id)]) ?>
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
