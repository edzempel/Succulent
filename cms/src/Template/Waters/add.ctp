<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Water $water
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Waters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Plants'), ['controller' => 'Plants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Plant'), ['controller' => 'Plants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="waters form large-9 medium-8 columns content">
    <?= $this->Form->create($water) ?>
    <fieldset>
        <legend><?= __('Add Water') ?></legend>
        <?php
            echo $this->Form->control('plant_id', ['options' => $plants]);
            echo $this->Form->control('water_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
