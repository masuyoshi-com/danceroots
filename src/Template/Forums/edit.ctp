<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forum $forum
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $forum->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Forums'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Forum Comments'), ['controller' => 'ForumComments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Forum Comment'), ['controller' => 'ForumComments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="forums form large-9 medium-8 columns content">
    <?= $this->Form->create($forum) ?>
    <fieldset>
        <legend><?= __('Edit Forum') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('category');
            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('youtube');
            echo $this->Form->control('anonymous_flag');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
