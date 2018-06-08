<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TeamGroup $teamGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Team Group'), ['action' => 'edit', $teamGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Team Group'), ['action' => 'delete', $teamGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Team Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teamGroups view large-9 medium-8 columns content">
    <h3><?= h($teamGroup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Team') ?></th>
            <td><?= $teamGroup->has('team') ? $this->Html->link($teamGroup->team->name, ['controller' => 'Teams', 'action' => 'view', $teamGroup->team->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $teamGroup->has('user') ? $this->Html->link($teamGroup->user->id, ['controller' => 'Users', 'action' => 'view', $teamGroup->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($teamGroup->id) ?></td>
        </tr>
    </table>
</div>
