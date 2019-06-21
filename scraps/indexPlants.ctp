<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant[]|\Cake\Collection\CollectionInterface $plants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Plant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pots'), ['controller' => 'Pots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pot'), ['controller' => 'Pots', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Waters'), ['controller' => 'Waters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Water'), ['controller' => 'Waters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="plants index large-9 medium-8 columns content">
    <h3><?= __('Plants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('scientific_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('common_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($plants as $plant): ?>
            <tr>
                <td><?= $this->Number->format($plant->id) ?></td>
                <td><?= $plant->has('user') ? $this->Html->link($plant->user->id, ['controller' => 'Users', 'action' => 'view', $plant->user->id]) : '' ?></td>
                <td><?= h($plant->scientific_name) ?></td>
                <td><?= h($plant->common_name) ?></td>
                <td><?= h($plant->slug) ?></td>
                <td><?= h($plant->created) ?></td>
                <td><?= h($plant->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $plant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $plant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $plant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plant->id)]) ?>
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
