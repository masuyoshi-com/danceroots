<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousTeamMember $famousTeamMember
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Famous Team Member'), ['action' => 'edit', $famousTeamMember->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Famous Team Member'), ['action' => 'delete', $famousTeamMember->id], ['confirm' => __('Are you sure you want to delete # {0}?', $famousTeamMember->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Famous Team Members'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Famous Team Member'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Famous Teams'), ['controller' => 'FamousTeams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Famous Team'), ['controller' => 'FamousTeams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Famous Dancers'), ['controller' => 'FamousDancers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Famous Dancer'), ['controller' => 'FamousDancers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="famousTeamMembers view large-9 medium-8 columns content">
    <h3><?= h($famousTeamMember->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $famousTeamMember->has('user') ? $this->Html->link($famousTeamMember->user->username, ['controller' => 'Users', 'action' => 'view', $famousTeamMember->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Famous Team') ?></th>
            <td><?= $famousTeamMember->has('famous_team') ? $this->Html->link($famousTeamMember->famous_team->name, ['controller' => 'FamousTeams', 'action' => 'view', $famousTeamMember->famous_team->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Famous Dancer') ?></th>
            <td><?= $famousTeamMember->has('famous_dancer') ? $this->Html->link($famousTeamMember->famous_dancer->name, ['controller' => 'FamousDancers', 'action' => 'view', $famousTeamMember->famous_dancer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($famousTeamMember->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($famousTeamMember->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($famousTeamMember->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Leader Flag') ?></th>
            <td><?= $this->Number->format($famousTeamMember->leader_flag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($famousTeamMember->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($famousTeamMember->modified) ?></td>
        </tr>
    </table>
</div>
