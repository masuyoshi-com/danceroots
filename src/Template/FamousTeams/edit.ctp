<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousTeam $famousTeam
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $famousTeam->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $famousTeam->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Famous Teams'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Famous Team Members'), ['controller' => 'FamousTeamMembers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Famous Team Member'), ['controller' => 'FamousTeamMembers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="famousTeams form large-9 medium-8 columns content">
    <?= $this->Form->create($famousTeam) ?>
    <fieldset>
        <legend><?= __('Edit Famous Team') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('name');
            echo $this->Form->control('image');
            echo $this->Form->control('genre');
            echo $this->Form->control('pref');
            echo $this->Form->control('period');
            echo $this->Form->control('profile');
            echo $this->Form->control('youtube1');
            echo $this->Form->control('youtube2');
            echo $this->Form->control('youtube3');
            echo $this->Form->control('style');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
