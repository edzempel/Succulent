<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */

// display current logged in user's email
// https://stackoverflow.com/questions/28273115/how-to-access-logged-in-user-data-in-a-layout-cakephp-3
$current_user = $this->request->session()->read('Auth.User');
$email = $current_user['email'];
$username = $current_user['username'];
$this->assign('email', $email );
$this->assign('username', $username);
?>

<div class="container-profpic pt-5">
    <?= $this->Form->create($plant) ?>
    <fieldset>
        <legend class="text-center text-info"><?= __('Add plant for ').$this->fetch('username') ?></legend>
        <?php
//            echo $this->Form->control('user_id', [$plant->user_id]);
        echo $this->Form->control('common_name');
            echo $this->Form->control('scientific_name');
            echo $this->Form->control('notes');
        ?>
    </fieldset>
    <button class="btn btn-danger float-right mt-3 text-sci-name" type="submit">Add Plant</button>
    <?= $this->Form->end() ?>
</div>
