<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousEvent $famousEvent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $famousEvent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $famousEvent->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Famous Events'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="famousEvents form large-9 medium-8 columns content">
    <?= $this->Form->create($famousEvent) ?>
    <fieldset>
        <legend><?= __('Edit Famous Event') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('category');
            echo $this->Form->control('title');
            echo $this->Form->control('image');
            echo $this->Form->control('event_date');
            echo $this->Form->control('start');
            echo $this->Form->control('end');
            echo $this->Form->control('body');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
