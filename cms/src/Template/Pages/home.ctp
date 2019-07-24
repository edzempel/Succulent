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

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
$cakeDescription = 'Succulent';
$username = $this->request->session()->read('username');
if ($username == null) {
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


    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('custom.css') ?>


    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('jquery-3.4.1.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script src="https://kit.fontawesome.com/ae9903d00e.js"></script>
</head>

<body class="background">





<div class="sticky-top border-bottom">
    <nav class="navbar navbar-light bg-white" role="navigation">
        <div class="row">
            <div class="col">
                <?= $this->Html->image('logo.jpg', ['class' => 'navbar-brand d-inline-block align-top zoom ml-5 succlogo', 'alt' => 'succulent logo', 'url' => ['controller' => 'Plants', 'action' => 'index']]); ?>
            </div>
            
            <div class="dropdown col ">
                <button class="btn btn-success dropdown-toggle dropdown-menu-right fas fa-bars fa-2x mr-3 float-right mt-2" type="button" id="dropdownMenu2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </button>
                <div class="dropdown-menu dropdown-menu-right mr-4 text-sci-name" aria-labelledby="dropdownMenu2">
                    <div><?= $this->Html->link(__($username), ['controller' => 'Users', 'action'=> 'view'], ['class' => 'dropdown-item font-weight-bold']) ?></div>
                    <div><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'dropdown-item']) ?></div>
                    <a class="dropdown-item" href="https://book.cakephp.org/3.0/" target="_blank">Help </a>
                    <div class="dropdown-item">
                        <?= $this->Html->link(__(''), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'text-decoration-none text-dark fas fa-sign-out-alt']) ?>

                        <?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'text-decoration-none text-dark']) ?></div>

                </div>
            </div>
        </div>

    </nav>
</div>









<div class="container-prof">



        <h1 class="text-center text-com-color mt-5">Welcome to Succulent!</h1>

        <div class="row mt-5">

            <div class="col"></div>

            <div class="text-center col">
                <?= $this->Html->link(__('Create Account'), ['controller' => 'users', 'action' => 'add'], ['class' => 'btn btn-success mx-3']) ?>

                <?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'btn btn-success mx-3']) ?>
            </div>

            <div class="col">

            </div>


        </div>



</div>

</body>
</html>


