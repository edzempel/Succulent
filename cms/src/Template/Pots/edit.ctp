<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pot $pot
 */
$common_name = $this->request->session()->read('commmon_name');
$plant_id = $this->request->session()->read('plant_id');

?>
<div class="pots form large-9 medium-8 columns content">
    <?= $this->Form->create($pot) ?>
    <fieldset>
        <legend><?= __('Edit pot for ' . $common_name) ?></legend>
        <?php
        echo $this->Form->control('pot_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
