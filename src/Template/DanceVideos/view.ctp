<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DanceMovie $danceMovie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dance Movie'), ['action' => 'edit', $danceMovie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dance Movie'), ['action' => 'delete', $danceMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $danceMovie->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dance Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dance Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="danceMovies view large-9 medium-8 columns content">
    <h3><?= h($danceMovie->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $danceMovie->has('user') ? $this->Html->link($danceMovie->user->id, ['controller' => 'Users', 'action' => 'view', $danceMovie->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($danceMovie->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Youtube') ?></th>
            <td><?= h($danceMovie->youtube) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Genre') ?></th>
            <td><?= h($danceMovie->genre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= h($danceMovie->tag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($danceMovie->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($danceMovie->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($danceMovie->modified) ?></td>
        </tr>
    </table>
</div>
