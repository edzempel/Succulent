<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plant $plant
 */

// display current logged in user's email
// https://stackoverflow.com/questions/28273115/how-to-access-logged-in-user-data-in-a-layout-cakephp-3
$current_user = $this->request->session()->read('Auth.User');
$email = $current_user['email'];
$this->assign('email', $email );
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Plants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pots'), ['controller' => 'Pots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pot'), ['controller' => 'Pots', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Waters'), ['controller' => 'Waters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Water'), ['controller' => 'Waters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="plants form large-9 medium-8 columns content">
    <?= $this->Form->create($plant) ?>
    <fieldset>
        <legend><?= __('Add plant for: ').$this->fetch('email') ?></legend>
        <?php
//            echo $this->Form->control('user_id', [$plant->user_id]);
            echo $this->Form->control('scientific_name');
            echo $this->Form->control('common_name');
            echo $this->Form->control('slug');
            echo $this->Form->control('notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
</div>
