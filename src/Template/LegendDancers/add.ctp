<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LegendDancer $legendDancer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Legend Dancers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="legendDancers form large-9 medium-8 columns content">
    <?= $this->Form->create($legendDancer) ?>
    <fieldset>
        <legend><?= __('Add Legend Dancer') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
