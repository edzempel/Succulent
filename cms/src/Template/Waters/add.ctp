<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Water $water
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');

?>
<div class="container-profpic mt-4">

    <?= $this->Form->create($water) ?>
    <fieldset>
        <legend class="text-info text-center "><?= __('Add Water for ' . $common_name) ?></legend>
        <div class="text-sci-name text-secondary mt-4 text-center">Water Date (Y/M/D/H/M):</div>
        <div class="mt-3 text-center ml-3"> <?= $this->Form->control('water_date', ['empty' => true, 'label' => '', 'dateFormat' => 'dd-MM-yyyy', 'minYear' => '2017', 'type' => 'date', 'default' => date('dd-MM-yyyy')]) ?></div>
    </fieldset>

    <button class="btn btn-info float-right mt-4 text-sci-name" type="submit">Water</button>
    <div><?= $this->Html->link(__('Cancel'), ['controller' => 'plants', 'action' => 'view', $plant_id], ['class' => 'btn btn-danger mr-3 mt-4 text-sci-name float-right']) ?></div>
    <?= $this->Form->end() ?>

</div>