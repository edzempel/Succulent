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
            <div class="col ml-5">
                <?= $this->Html->image('logo.jpg', ['class' => 'navbar-brand d-inline-block align-top zoom ml-5 succlogo', 'alt' => 'succulent logo', 'url' => ['controller' => 'Plants', 'action' => 'index']]); ?>
            </div>
            
            <div class="col"></div>
        </div>

    </nav>
</div>



<div class="container-prof">



        <h1 class="text-center text-com-color mt-4">Welcome to Succulent!</h1>

        <div class="row mt-4">

            <div class="text-center col ">

                <div class="btn btn-success mx-3 position-relative">

                    <?= $this->Html->link(__('Create Account '), ['controller' => 'Users', 'action' => 'add'], ['class' => 'text-decoration-none text-white ']) ?>
                <?= $this->Html->link(__(''), ['controller' => 'Users', 'action' => 'add'], ['class' => 'text-decoration-none text-white fas fa-user-plus stretched-link']) ?>
                </div>



                <div class="btn btn-success mx-3 position-relative">
                    <?= $this->Html->link(__('Login '), ['controller' => 'Users', 'action' => 'login'], ['class' => 'text-decoration-none text-white']) ?>
                    <?= $this->Html->link(__(''), ['controller' => 'Users', 'action' => 'login'], ['class' => 'text-decoration-none text-white fas fa-sign-in-alt stretched-link']) ?>

                </div>


            </div>




        </div>


    <div class="">
        <div id="carouselExampleCaptions" class="carousel slide mt-4 mb-3" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/1920x1080.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/1920x1080.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/1920x1080.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/1920x1080.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


</div>

</body>
</html>


