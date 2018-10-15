<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousArtist $famousArtist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Famous Artist'), ['action' => 'edit', $famousArtist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Famous Artist'), ['action' => 'delete', $famousArtist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $famousArtist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Famous Artists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Famous Artist'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="famousArtists view large-9 medium-8 columns content">
    <h3><?= h($famousArtist->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $famousArtist->has('user') ? $this->Html->link($famousArtist->user->username, ['controller' => 'Users', 'action' => 'view', $famousArtist->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($famousArtist->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($famousArtist->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifed') ?></th>
            <td><?= h($famousArtist->modifed) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Iframe') ?></h4>
        <?= $this->Text->autoParagraph(h($famousArtist->iframe)); ?>
    </div>
</div>
