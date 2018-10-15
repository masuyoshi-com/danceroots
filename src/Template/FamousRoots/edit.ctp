<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousRoot $famousRoot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $famousRoot->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $famousRoot->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Famous Roots'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="famousRoots form large-9 medium-8 columns content">
    <?= $this->Form->create($famousRoot) ?>
    <fieldset>
        <legend><?= __('Edit Famous Root') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('title');
            echo $this->Form->control('year');
            echo $this->Form->control('body');
            echo $this->Form->control('youtube');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
