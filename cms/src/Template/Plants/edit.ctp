<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
$plant_id = $this->request->session()->read('plant_id');
?>

<div class="container-profpic mt-5">
    <?= $this->Form->create($plant) ?>
    <fieldset>
        <legend class="text-center text-info"><?= __('Edit Plant') ?></legend>
        <?php
            echo $this->Form->control('common_name');
            echo $this->Form->control('scientific_name');
            echo $this->Form->control('notes');
        ?>
    </fieldset>
    <button class="btn btn-success float-right mt-4 text-sci-name" type="submit">Save</button>
    <div><?= $this->Html->link(__('Cancel'), ['controller' => 'plants', 'action' => 'view', $plant_id], ['class' => 'btn btn-danger mr-3 mt-4 text-sci-name float-right']) ?></div>
    <?= $this->Form->end() ?>
</div>
