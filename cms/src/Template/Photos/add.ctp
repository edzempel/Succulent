<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo $photo
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Plants'), ['controller' => 'Plants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Plant'), ['controller' => 'Plants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="photos form large-9 medium-8 columns content">
    <?= $this->Form->create($photo, ['type' => 'file'])   ?>
    <fieldset>
        <legend><?= __('Add Photo for ' . $common_name ) ?></legend>
        <?php
//            echo $this->Form->control('plant_id', ['options' => $plants]);
            echo $this->Form->control('photo', ['type' => 'file']);
            //            echo $this->Form->control('dir');
            //            echo $this->Form->control('size');
            //            echo $this->Form->control('type');
            echo $this->Form->control('is_profile', ['label' => 'Set as profile photo?']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <div><?= $this->Html->link(__('Cancel'), ['controller' => 'plants', 'action' => 'view', $plant_id], ['class' => 'btn btn-danger mr-3 mt-4 text-sci-name float-right']) ?></div>
    <?= $this->Form->end() ?>
</div>
