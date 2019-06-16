<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pot $pot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pot'), ['action' => 'edit', $pot->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pot'), ['action' => 'delete', $pot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pot->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pots'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pot'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Plants'), ['controller' => 'Plants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Plant'), ['controller' => 'Plants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pots view large-9 medium-8 columns content">
    <h3><?= h($pot->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Plant') ?></th>
            <td><?= $pot->has('plant') ? $this->Html->link($pot->plant->id, ['controller' => 'Plants', 'action' => 'view', $pot->plant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pot->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pot Date') ?></th>
            <td><?= h($pot->pot_date) ?></td>
        </tr>
    </table>
</div>
