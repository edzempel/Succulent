<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Water $water
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Water'), ['action' => 'edit', $water->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Water'), ['action' => 'delete', $water->id], ['confirm' => __('Are you sure you want to delete # {0}?', $water->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Waters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Water'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Plants'), ['controller' => 'Plants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plant'), ['controller' => 'Plants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="waters view large-9 medium-8 columns content">
    <h3><?= h($water->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Plant') ?></th>
            <td><?= $water->has('plant') ? $this->Html->link($water->plant->id, ['controller' => 'Plants', 'action' => 'view', $water->plant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($water->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Water Date') ?></th>
            <td><?= h($water->water_date) ?></td>
        </tr>
    </table>
</div>
