<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousEvent $famousEvent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Famous Event'), ['action' => 'edit', $famousEvent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Famous Event'), ['action' => 'delete', $famousEvent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $famousEvent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Famous Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Famous Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="famousEvents view large-9 medium-8 columns content">
    <h3><?= h($famousEvent->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $famousEvent->has('user') ? $this->Html->link($famousEvent->user->username, ['controller' => 'Users', 'action' => 'view', $famousEvent->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($famousEvent->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($famousEvent->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($famousEvent->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($famousEvent->start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($famousEvent->end) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($famousEvent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Date') ?></th>
            <td><?= h($famousEvent->event_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($famousEvent->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($famousEvent->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($famousEvent->body)); ?>
    </div>
</div>
