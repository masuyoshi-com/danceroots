<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FamousTeamMember[]|\Cake\Collection\CollectionInterface $famousTeamMembers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Famous Team Member'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Famous Teams'), ['controller' => 'FamousTeams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Famous Team'), ['controller' => 'FamousTeams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Famous Dancers'), ['controller' => 'FamousDancers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Famous Dancer'), ['controller' => 'FamousDancers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="famousTeamMembers index large-9 medium-8 columns content">
    <h3><?= __('Famous Team Members') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('famous_team_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('famous_dancer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('leader_flag') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($famousTeamMembers as $famousTeamMember): ?>
            <tr>
                <td><?= $this->Number->format($famousTeamMember->id) ?></td>
                <td><?= $famousTeamMember->has('user') ? $this->Html->link($famousTeamMember->user->username, ['controller' => 'Users', 'action' => 'view', $famousTeamMember->user->id]) : '' ?></td>
                <td><?= $famousTeamMember->has('famous_team') ? $this->Html->link($famousTeamMember->famous_team->name, ['controller' => 'FamousTeams', 'action' => 'view', $famousTeamMember->famous_team->id]) : '' ?></td>
                <td><?= $famousTeamMember->has('famous_dancer') ? $this->Html->link($famousTeamMember->famous_dancer->name, ['controller' => 'FamousDancers', 'action' => 'view', $famousTeamMember->famous_dancer->id]) : '' ?></td>
                <td><?= h($famousTeamMember->name) ?></td>
                <td><?= h($famousTeamMember->image) ?></td>
                <td><?= $this->Number->format($famousTeamMember->leader_flag) ?></td>
                <td><?= h($famousTeamMember->created) ?></td>
                <td><?= h($famousTeamMember->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $famousTeamMember->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $famousTeamMember->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $famousTeamMember->id], ['confirm' => __('Are you sure you want to delete # {0}?', $famousTeamMember->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
