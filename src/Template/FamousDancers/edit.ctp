<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousDancer $famousDancer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $famousDancer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $famousDancer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Famous Dancers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Famous Team Members'), ['controller' => 'FamousTeamMembers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Famous Team Member'), ['controller' => 'FamousTeamMembers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="famousDancers form large-9 medium-8 columns content">
    <?= $this->Form->create($famousDancer) ?>
    <fieldset>
        <legend><?= __('Edit Famous Dancer') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('name');
            echo $this->Form->control('icon');
            echo $this->Form->control('image');
            echo $this->Form->control('genre');
            echo $this->Form->control('profile');
            echo $this->Form->control('iv_trigger');
            echo $this->Form->control('iv_inspire');
            echo $this->Form->control('iv_dancer');
            echo $this->Form->control('iv_instructor');
            echo $this->Form->control('iv_advice');
            echo $this->Form->control('youtube1');
            echo $this->Form->control('youtube2');
            echo $this->Form->control('youtube3');
            echo $this->Form->control('sche_sun');
            echo $this->Form->control('sche_mon');
            echo $this->Form->control('sche_tue');
            echo $this->Form->control('sche_wed');
            echo $this->Form->control('sche_thu');
            echo $this->Form->control('sche_fri');
            echo $this->Form->control('sche_sat');
            echo $this->Form->control('facebook');
            echo $this->Form->control('twitter');
            echo $this->Form->control('instagram');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
