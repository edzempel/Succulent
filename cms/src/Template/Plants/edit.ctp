<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */
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
    <button class="btn btn-danger float-right mt-3 text-sci-name" type="submit">Save</button>
    <?= $this->Form->end() ?>
</div>
