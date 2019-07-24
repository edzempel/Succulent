<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Water $water
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');

?>
<div class="container-profpic">

    <?= $this->Form->create($water) ?>
    <fieldset>
        <legend class="text-info text-center mt-5"><?= __('Add Water for ' . $common_name) ?></legend>

        <div class="mt-4"> <?= $this->Form->control('water_date', ['empty' => true]); ?></div>
    </fieldset>

    <button class="btn btn-info float-right mt-3 text-sci-name" type="submit">Water</button>
    <div><?= $this->Html->link(__('Cancel'), ['controller' => 'plants', 'action' => 'view', $plant_id], ['class' => 'btn btn-danger mr-3 mt-3 text-sci-name float-right']) ?></div>
    <?= $this->Form->end() ?>

</div>