<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pot $pot
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');

?>

<div class="container-profpic">
    <?= $this->Form->create($pot) ?>
    <fieldset>
        <legend class="text-info text-center mt-5"><?= __('Add Pot for ' . $common_name) ?></legend>

        <div class="mt-4"> <?= $this->Form->control('pot_date', ['empty' => true]); ?></div>
    </fieldset>
    <button class="btn btn-warning float-right mt-3 text-sci-name" type="submit">Pot</button>
    <div><?= $this->Html->link(__('Cancel'), ['controller' => '', 'action' => ''], ['class' => 'btn btn-danger mr-3 mt-3 text-sci-name float-right']) ?></div>
    <?= $this->Form->end() ?>

</div>
