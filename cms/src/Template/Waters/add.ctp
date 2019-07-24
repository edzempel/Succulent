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
    <button class="btn btn-danger float-right mt-3 text-sci-name" type="submit">Add</button>
    <?= $this->Form->end() ?>

</div>