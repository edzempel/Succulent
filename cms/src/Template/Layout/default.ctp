<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Succulent';
$username = $this->Session->read('username');
if($username == null){
    $username = 'Account';
}
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('custom.css') ?>


    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('jquery-3.4.1.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>
<body class="background">


<div class="sticky-top border-bottom">
    <nav class="navbar navbar-light bg-white" role="navigation">

        <?= $this->Html->image('logo.jpg', ['class' => 'navbar-brand d-inline-block align-top zoom ml-4', 'alt' => 'succulent logo', 'width' => '150', 'height' => '150', 'url' => ['controller' => 'Plants', 'action' => 'index']]); ?>


        <h1 class="header text-warning"><a><?= $this->fetch('title') ?></a></h1>


        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle mr-5 " type="button" id="dropdownMenu2"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                <a><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'dropdown-item']) ?></a>
                <a><?= $this->Html->link(__($username), ['controller' => 'Users', 'action'=> 'view'], ['class' => 'dropdown-item']) ?></a>
                <a><?= $this->Html->link(__('Library'), ['controller' => 'Plants', 'action'=> 'index'], ['class' => 'dropdown-item']) ?></a>
                <a><?= $this->Html->link(__('Schedule'), ['action' => 'Schedule'], ['class' => 'dropdown-item']) ?></a>
                <a><?= $this->Html->link(__('Settings'), ['action' => 'Settings'], ['class' => 'dropdown-item']) ?></a>
                <a class="dropdown-item" href="https://book.cakephp.org/3.0/">Help </a>
                <a><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'dropdown-item']) ?></a>
            </div>
        </div>

    </nav>
</div>


<?= $this->Flash->render() ?>

<div class="">
    <?= $this->fetch('content') ?>
</div>


<footer>
</footer>
</body>
</html>
