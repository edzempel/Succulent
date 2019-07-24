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
        <legend class="mb-4 mt-5 text-center text-info "><?= __('Edit pot for ' . $common_name) ?></legend>
        <?php
        echo $this->Form->control('pot_date', ['empty' => true]);
        ?>
    </fieldset>
    <button class="btn btn-info float-right mt-3 text-sci-name" type="submit">Save</button>
    <div><?= $this->Html->link(__('Cancel'), ['controller' => '', 'action' => ''], ['class' => 'btn btn-danger mr-3 mt-3 text-sci-name float-right']) ?></div>
    <?= $this->Form->end() ?>
</div>
