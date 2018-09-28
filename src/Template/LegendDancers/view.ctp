<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LegendDancer $legendDancer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Legend Dancer'), ['action' => 'edit', $legendDancer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Legend Dancer'), ['action' => 'delete', $legendDancer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $legendDancer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Legend Dancers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Legend Dancer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="legendDancers view large-9 medium-8 columns content">
    <h3><?= h($legendDancer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($legendDancer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($legendDancer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($legendDancer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($legendDancer->modified) ?></td>
        </tr>
    </table>
</div>
