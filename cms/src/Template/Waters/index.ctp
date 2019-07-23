<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Water[]|\Cake\Collection\CollectionInterface $waters
 */
$days_since_last_watered = $this->request->session()->read('days_since_watered');
$average_days_between_waters = $this->request->session()->read('average_days_between_waters');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Water'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Plants'), ['controller' => 'Plants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Plant'), ['controller' => 'Plants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="container">
    <div><?=$this->Html->link(__('Go back'), $this->request->referer()); ?></div>
    <div class="card">
        <div class="card-body mx-auto">
            <h2 class="card-title">
                <?= $days_since_last_watered ?>
            </h2>
            <p class="card-text">Days since last watering</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body mx-auto">
            <h2 class="card-title">
                <?= $average_days_between_waters ?>
            </h2>
            <p class="card-text">Average days between watering</p>
        </div>
    </div>
</div>
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
