<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container-profpic pt-5">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Welcome to succulent!') ?></legend>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('username');
        ?>
    </fieldset>
    <button class="btn btn-danger float-right mt-3 text-sci-name" type="submit">Create Account</button>

    <?= $this->Form->end() ?>
</div>
