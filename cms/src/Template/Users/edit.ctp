<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container-profpic my-4">
<div class="">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend class="text-info text-center">Edit Profile</legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <button class="btn btn-info float-right mt-3 text-sci-name" type="submit">Save</button>
    <div><?= $this->Html->link(__('Cancel'), ['controller' => 'users', 'action' => 'view'], ['class' => 'btn btn-danger mr-3 mt-3 text-sci-name float-right']) ?></div>
    <?= $this->Form->end() ?>
    <?= $this->Form->end() ?>
</div>
</div>