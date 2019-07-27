<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Water $water
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');

?>

<div class="container-profpic mt-4">
    <div class="">
        <?= $this->Form->create($water) ?>
        <fieldset>
            <legend class="text-center text-info "><?= __('Edit Water for ' . $common_name) ?></legend>
            <div class="text-sci-name text-secondary mt-4 text-center">Water Date (Y/M/D/H/M): </div>
            <div class="mt-3 text-center ml-3">
            <?= $this->Form->control('water_date', ['empty' => true, 'label'=>'' ]); ?>
            </div>
        </fieldset>
        <button class="btn btn-info float-right mt-3 text-sci-name" type="submit">Save</button>
        <div><?= $this->Html->link(__('Cancel'), ['controller' => 'waters', 'action' => 'index', $plant_id], ['class' => 'btn btn-danger mr-3 mt-3 text-sci-name float-right']) ?></div>
        <?= $this->Form->end() ?>
    </div>
</div>