<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Water $water
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');

?>

<div class="container-profpic">
    <div class="">
        <?= $this->Form->create($water) ?>
        <fieldset>
            <legend class="mb-4 mt-5 text-center text-info "><?= __('Edit Water for ' . $common_name) ?></legend>

            <!--            echo $this->Form->control('plant_id', ['options' => $plants]);-->
            <?= $this->Form->control('water_date', ['empty' => true]); ?>
        </fieldset>
        <button class="btn btn-info float-right mt-3 text-sci-name" type="submit">Save</button>
        <div><?= $this->Html->link(__('Cancel'), ['controller' => '', 'action' => ''], ['class' => 'btn btn-danger mr-3 mt-3 text-sci-name float-right']) ?></div>
        <?= $this->Form->end() ?>
    </div>
</div>