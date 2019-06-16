<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pot[]|\Cake\Collection\CollectionInterface $pots
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pot'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Plants'), ['controller' => 'Plants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Plant'), ['controller' => 'Plants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pots index large-9 medium-8 columns content">
    <h3><?= __('Pots') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pot_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pots as $pot): ?>
            <tr>
                <td><?= $this->Number->format($pot->id) ?></td>
                <td><?= $pot->has('plant') ? $this->Html->link($pot->plant->id, ['controller' => 'Plants', 'action' => 'view', $pot->plant->id]) : '' ?></td>
                <td><?= h($pot->pot_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pot->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pot->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pot->id)]) ?>
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
