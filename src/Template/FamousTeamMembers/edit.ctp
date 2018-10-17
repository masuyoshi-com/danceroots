<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousTeamMember $famousTeamMember
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $famousTeamMember->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $famousTeamMember->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Famous Team Members'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Famous Teams'), ['controller' => 'FamousTeams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Famous Team'), ['controller' => 'FamousTeams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Famous Dancers'), ['controller' => 'FamousDancers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Famous Dancer'), ['controller' => 'FamousDancers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="famousTeamMembers form large-9 medium-8 columns content">
    <?= $this->Form->create($famousTeamMember) ?>
    <fieldset>
        <legend><?= __('Edit Famous Team Member') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('famous_team_id', ['options' => $famousTeams]);
            echo $this->Form->control('famous_dancer_id', ['options' => $famousDancers, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('image');
            echo $this->Form->control('leader_flag');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
