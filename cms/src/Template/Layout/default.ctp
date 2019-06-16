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

$cakeDescription = 'CakePHP: the rapid development php framework';
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

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('bootstrap-grid.css') ?>
    <?= $this->Html->css('bootstrap-reboot.css') ?>



    <?=  $this->Html->script('bootstrap.js')?>
    <?=  $this->Html->script('bootstrap.bundle.js')?>
    <?=  $this->Html->script('bootstrap.js')?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Succulent</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">LIBRARY<span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <div class="dropdown show ">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>


<!--                <li class="nav-item dropdown">-->
<!--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"-->
<!--                       aria-haspopup="true" aria-expanded="false">-->
<!--                        Dropdown link-->
<!--                    </a>-->
<!---->
<!--                    <div class="dropdown-menu">-->
<!--                        <a class="dropdown-item" href="#">Action</a>-->
<!--                        <a class="dropdown-item" href="#">Another action</a>-->
<!--                        <a class="dropdown-item" href="#">Something else here</a>-->
<!--                    </div>-->
<!--                </li>-->

        </div>
    </nav>


    <!--    <nav class="top-bar" data-topbar role="navigation">-->
    <!--        <ul class="title-area large-3 medium-4 columns">-->
    <!--            <li class="name">-->
    <!--                <h1><a href="">--><!--//= $this->fetch('title')--><!--</a></h1>-->
    <!--            </li>-->
    <!--        </ul>-->
    <!--        <div class="top-bar-section">-->
    <!--            <ul class="right">-->
    <!--                <li class="menu-icon"></li>-->
    <!---->
    <!--                <li class="has-dropdown">-->
    <!--                    <a href="#">Settings is wide</a>-->
    <!--                    <ul class="dropdown not-click contain-to-grid" data-options="dropdown_autoclose: false">-->
    <!--                        <li>--><!--//= $this->Html->link(__('Login'), ['action' => 'login'])--><!--</li>-->
    <!--                        <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>-->
    <!--                        <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>-->
    <!--                        <li>--><!--//= $this->Html->link(__('Logout'), ['action' => 'logout'])--><!--</li>-->
    <!--                    </ul>-->
    <!--                </li>-->
    <!---->
    <!--            </ul>-->
    <!--        </div>-->
    <!--    </nav>-->
    <!--</div>-->
    <?= $this->Flash->render() ?>
    <div>
        <?= $this->fetch('content') ?>
    </div>
</div>
<footer>
</footer>
</body>
</html>
