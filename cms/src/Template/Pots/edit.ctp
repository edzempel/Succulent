<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pot $pot
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');

?>
<div class="container-profpic mt-5">
    <?= $this->Form->create($pot) ?>
    <fieldset>
        <legend class="text-center text-info "><?= __('Edit pot for ' . $common_name) ?></legend>
        <div class="text-sci-name text-secondary mt-4 text-center">Pot Date (Y/M/D): </div>
        <div class="mt-3 text-center ml-3">
            <?= $this->Form->control('pot_date', ['empty' => true, 'label'=>'','type' => 'date', 'dateFormat' => 'dd-MM-yyyy' ]); ?>
        </div>
    </fieldset>
    <button class="btn btn-info float-right mt-3 text-sci-name" type="submit">Save</button>
    <div><?= $this->Html->link(__('Cancel'), ['controller' => 'pots', 'action' => 'index', $plant_id], ['class' => 'btn btn-danger mr-3 mt-3 text-sci-name float-right']) ?></div>
    <?= $this->Form->end() ?>
</div>
