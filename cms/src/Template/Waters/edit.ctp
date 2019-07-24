<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Water $water
 */
$common_name = $this->request->session()->read('commmon_name');
?>

<div class="container-profpic">
    <div class="">
        <?= $this->Form->create($water) ?>
        <fieldset>
            <legend class="mb-4 mt-5 text-center text-info "><?= __('Edit Water for ' . $common_name) ?></legend>

            <!--            echo $this->Form->control('plant_id', ['options' => $plants]);-->
            <?= $this->Form->control('water_date', ['empty' => true]); ?>
        </fieldset>
        <button class="btn btn-danger float-right mt-3 text-sci-name" type="submit">Save</button>
        <?= $this->Form->end() ?>
    </div>
</div>