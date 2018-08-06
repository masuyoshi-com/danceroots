<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudioSchedule $studioSchedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Studio Schedules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="studioSchedules form large-9 medium-8 columns content">
    <?= $this->Form->create($studioSchedule) ?>
    <fieldset>
        <legend><?= __('Add Studio Schedule') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('name');
            echo $this->Form->control('genre');
            echo $this->Form->control('week');
            echo $this->Form->control('start');
            echo $this->Form->control('end');
            echo $this->Form->control('image');
            echo $this->Form->control('youtube');
            echo $this->Form->control('profile');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
