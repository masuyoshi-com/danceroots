<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TeamGroup $teamGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $teamGroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $teamGroup->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Team Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teamGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($teamGroup) ?>
    <fieldset>
        <legend><?= __('Edit Team Group') ?></legend>
        <?php
            echo $this->Form->control('team_id', ['options' => $teams]);
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
