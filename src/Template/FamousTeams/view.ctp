<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousTeam $famousTeam
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Famous Team'), ['action' => 'edit', $famousTeam->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Famous Team'), ['action' => 'delete', $famousTeam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $famousTeam->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Famous Teams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Famous Team'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="famousTeams view large-9 medium-8 columns content">
    <h3><?= h($famousTeam->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($famousTeam->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($famousTeam->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($famousTeam->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($famousTeam->modified) ?></td>
        </tr>
    </table>
</div>
