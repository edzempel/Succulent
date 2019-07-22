<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Water[]|\Cake\Collection\CollectionInterface $waters
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Water'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Plants'), ['controller' => 'Plants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Plant'), ['controller' => 'Plants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="waters index large-9 medium-8 columns content">
    <div>Watering History</div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('water_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($waters as $water): ?>
            <tr>
                <td><?= $this->Number->format($water->id) ?></td>
                <td><?= $water->has('plant') ? $this->Html->link($water->plant->id, ['controller' => 'Plants', 'action' => 'view', $water->plant->id]) : '' ?></td>
                <td><?= h($water->water_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $water->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $water->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $water->id], ['confirm' => __('Are you sure you want to delete # {0}?', $water->id)]) ?>
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
