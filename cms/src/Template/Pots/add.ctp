<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pot $pot
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');

?>

<div class="container-profpic mt-4">
    <?= $this->Form->create($pot) ?>
    <fieldset>
        <legend class="text-info text-center"><?= __('Add Pot for ' . $common_name) ?></legend>

        <div class="text-sci-name text-secondary mt-4 text-center">Pot Date (Y/M/D/H/M): </div>

        <div class="mt-3 text-center ml-3"> <?= $this->Form->control('pot_date', ['empty' => true,'label' =>'', 'default'=> date('Y-F-d-G-i')]) ?></div>
    </fieldset>
    <button class="btn btn-warning float-right mt-3 text-sci-name" type="submit">Pot</button>
    <div><?= $this->Html->link(__('Cancel'), ['controller' => 'plants', 'action' => 'view', $plant_id], ['class' => 'btn btn-danger mr-3 mt-3 text-sci-name float-right']) ?></div>
    <?= $this->Form->end() ?>

</div>
