<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container-profpic">



    <div class="row mt-4">
        <div class="col-12">

            <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id], ['class' => 'btn btn-danger float-right mt-3 mr-4 fas fa-trash-alt fa-2x', 'confirm' => __('Are you sure you want to delete the profile and all the data for {0}?', $user->username)]) ?>



            <?= $this->Html->link(__(''), ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary float-right mt-3 mr-4 fas fa-pen fa-2x']) ?>

    </div>


<div class="mx-5 my-3 ">
<fieldset>
    <Legend class="text-info text-center"><?= h($user->username).'\'s Profile ' ?></Legend>

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td>••••••••••••</td>
        </tr>

        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</fieldset>
</div>
</div>
</div>