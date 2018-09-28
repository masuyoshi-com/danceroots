<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LegendTeam $legendTeam
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Legend Teams'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="legendTeams form large-9 medium-8 columns content">
    <?= $this->Form->create($legendTeam) ?>
    <fieldset>
        <legend><?= __('Add Legend Team') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
