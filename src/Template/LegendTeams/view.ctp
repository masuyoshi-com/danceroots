<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LegendTeam $legendTeam
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Legend Team'), ['action' => 'edit', $legendTeam->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Legend Team'), ['action' => 'delete', $legendTeam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $legendTeam->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Legend Teams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Legend Team'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="legendTeams view large-9 medium-8 columns content">
    <h3><?= h($legendTeam->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($legendTeam->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($legendTeam->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($legendTeam->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($legendTeam->modified) ?></td>
        </tr>
    </table>
</div>
