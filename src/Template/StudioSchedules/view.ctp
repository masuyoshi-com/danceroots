<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudioSchedule $studioSchedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Studio Schedule'), ['action' => 'edit', $studioSchedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Studio Schedule'), ['action' => 'delete', $studioSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studioSchedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Studio Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Studio Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="studioSchedules view large-9 medium-8 columns content">
    <h3><?= h($studioSchedule->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $studioSchedule->has('user') ? $this->Html->link($studioSchedule->user->username, ['controller' => 'Users', 'action' => 'view', $studioSchedule->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($studioSchedule->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Genre') ?></th>
            <td><?= h($studioSchedule->genre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($studioSchedule->start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($studioSchedule->end) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($studioSchedule->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Youtube') ?></th>
            <td><?= h($studioSchedule->youtube) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profile') ?></th>
            <td><?= h($studioSchedule->profile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($studioSchedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Week') ?></th>
            <td><?= $this->Number->format($studioSchedule->week) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($studioSchedule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($studioSchedule->modified) ?></td>
        </tr>
    </table>
</div>
