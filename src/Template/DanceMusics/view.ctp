<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DanceMusic $danceMusic
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dance Music'), ['action' => 'edit', $danceMusic->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dance Music'), ['action' => 'delete', $danceMusic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $danceMusic->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dance Musics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dance Music'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="danceMusics view large-9 medium-8 columns content">
    <h3><?= h($danceMusic->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $danceMusic->has('user') ? $this->Html->link($danceMusic->user->id, ['controller' => 'Users', 'action' => 'view', $danceMusic->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($danceMusic->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Youtube') ?></th>
            <td><?= h($danceMusic->youtube) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Genre') ?></th>
            <td><?= h($danceMusic->genre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= h($danceMusic->tag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($danceMusic->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($danceMusic->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($danceMusic->modified) ?></td>
        </tr>
    </table>
</div>
