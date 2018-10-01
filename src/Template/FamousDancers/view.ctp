<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousDancer $famousDancer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Famous Dancer'), ['action' => 'edit', $famousDancer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Famous Dancer'), ['action' => 'delete', $famousDancer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $famousDancer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Famous Dancers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Famous Dancer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="famousDancers view large-9 medium-8 columns content">
    <h3><?= h($famousDancer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($famousDancer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($famousDancer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($famousDancer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($famousDancer->modified) ?></td>
        </tr>
    </table>
</div>
