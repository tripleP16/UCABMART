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
 * @var \App\View\AppView $this
 */

$cakeDescription = 'UCABMART pague y lleve';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));?>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <link href="/UCABMART/img/cake.icon.png" type="image/x-icon" rel="icon">
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/UCABMART/css/navbar.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  
    <script type="text/javascript" src="/UCABMART/js/index.js"></script>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <nav class="row  brown darken-2">
        <div class="nav-wrapper row">
            <a href="/UCABMART/" class="brand-logo"><img src="/UCABMART/img/logo.png" id="logo"></a>
            <a href="#" data-target="mobile-nav" class="sidenav-trigger" id="menu"><i class="material-icons">menu</i></a>
            <ul class="row hide-on-med-and-down">
                <div class="col s2"></div>
                <li class="col s6 l5 xl7 ">
                    <?= $this->Element('barrabusquedaform')?>
                </li>
                <?php
                    if($loggedIn):
                ?>
                    <li class="col s1 l1 xl1 right "><?= $this->Html->link(__('Logout'), ['controller'=>'CuentaUsuario', 'action' =>'logout']);?></li>
                <?php 
                    else:
                ?>
                     <li class="col s1 l1 xl1 right "><?= $this->Html->link(__('Login'), ['controller'=>'CuentaUsuario', 'action' =>'login']);?></li>
                     <li class="col s1 l1 xl1 right"><?= $this->Html->link(__('Registrarse'), ['controller'=>'PersonaNatural', 'action' =>'add']);?></li> 
                <?php 
                    endif;
                ?>

                <li class="col s1 l1 xl1 right"><a href="">Notimart</a></li> <!-- Faltan los links , hay que hacer el login para eso -->
                 
            </ul>
        </div>
        <ul class="sidenav brown darken-2" id="mobile-nav">
                <li> <?= $this->Element('barrabusquedaform')?></li>
                <li><?= $this->Html->link(__('Login'), ['controller'=>'CuentaUsuario', 'action' =>'login']);?></li>
                <li><a href="">Notimart</a></li> <!-- Faltan los links , hay que hacer el login para eso -->
                <li><?= $this->Html->link(__('Registrarse'), ['controller'=>'PersonaNatural', 'action' =>'add']);?></li>                 
        </ul>
    </nav>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    <footer>
    </footer>
</body>
</html>
