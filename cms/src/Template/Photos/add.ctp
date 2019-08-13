<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo $photo
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');
?>

<div class="container-profpic mt-4">
    <?= $this->Form->create($photo, ['type' => 'file'])   ?>
    <fieldset>
        <legend class="text-center text-info"><?= __('Add Photo for ' . $common_name ) ?></legend>
        <div class="text-sci-name text-secondary mt-4 mb-2">Browse Photos</div>
        <div class=""><?= $this->Form->control('photo', ['type' => 'file', 'label' => '', 'class'=> '']); ?></div>
    </fieldset>

    <div><?= $this->Html->link(__('Cancel'), ['controller' => 'plants', 'action' => 'view', $plant_id], ['class' => 'btn btn-danger mr-3 mt-4 text-sci-name float-left']) ?></div>

    <button class="btn btn-info float-left mt-4 text-sci-name" type="submit">Upload</button>

    <?= $this->Form->end() ?>
</div>