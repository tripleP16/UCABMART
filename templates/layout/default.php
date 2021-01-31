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
<ul id="dropdown1" class="dropdown-content">
    <?php
        foreach ($privilegios as $privilegio): 
        ?>
    <?php
        if($privilegio == 'E nat'):
    ?>
        <li><?= $this->Html->link(__('Editar Usuario'), ['controller'=>'PersonaNatural','action' => 'edit', $this->request->getSession()->read('Auth.User.Persona')]) ?></li>
        <li><?= $this->Html->link(__('Ver Carnet'), ['controller'=>'Reporte','action' => 'personanaturalreport',$this->request->getSession()->read('Auth.User.Persona'), $tienda]) ?></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'E jur'):
    ?>
        <li><?= $this->Html->link(__('Ver Carnet'), ['controller'=>'Reporte', 'action' => 'personajuridicareport', $this->request->getSession()->read('Auth.User.Persona'), $tienda]) ?></li>
        <li><?= $this->Html->link(__('Editar Usuario'), ['controller'=>'PersonaJuridica','action' => 'edit', $this->request->getSession()->read('Auth.User.Persona')]) ?></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'Cajero'):
    ?>
        <li><a href="">Ir al cajero</a></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'E empleado'):
    ?>
        <li><?= $this->Html->link(__('Editar Mi Perfil'), ['controller'=>'Empleado','action' => 'Edit',$this->request->getSession()->read('Auth.User.Persona')]) ?></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'Comprar'):
    ?>
        <li ><a href="">Carro de Compras<i class="material-icons">shopping_cart</i> <span class="new badge">4</span></a></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'Despedir'):
    ?>
        <li><a href="">Despedir Empleado</a></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'Contratar'):
    ?>
        <li><?= $this->Html->link(__('Contratar Empleado'), ['controller'=>'empleado','action' => 'add']) ?></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'Notimart'):
    ?>
        <li><a href="">Gestion de Empleado</a></li>
    <?php 
         endif;              
    ?>

    <?php
        if($privilegio == 'Orden de Compra'):
    ?>
        <li><a href="">Gestion de Orden de Compra</a></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'Asistencia'):
    ?>
        <li><a href="">Asistencia de Empleados</a></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'Rendimiento'):
    ?>
        <li><a href="">Rendimiento de tiendas</a></li>
        <li><a href="">Gestion de Tiendas</a></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'Despacho'):
    ?>
        <li><a href="">Departamento de despacho</a></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'Entrega'):
    ?>
        <li><a href="">Departamento de Entregas</a></li>
    <?php 
         endif;              
    ?>

    <?php
        if($privilegio == 'Productos'):
    ?>
        <li><a href="">Gestion de Proveedores</a></li>
        <li><a href="">Gestion de Productos</a></li>
    <?php 
         endif;              
    ?>
    <?php
        if($privilegio == 'Crear Rol'):
    ?>
        <li><?= $this->Html->link(__('Crear Rol'), ['controller'=>'rol','action' => 'add']) ?></li>
    <?php 
         endif;              
    ?>
    <?php
        endforeach;
    ?>
    
</ul>
    <nav class="row  brown darken-2">
        <div class="nav-wrapper row">
            <a href="/UCABMART/" class="brand-logo"><img src="/UCABMART/img/logo.png" id="logo"></a>
            <a href="#" data-target="mobile-nav" class="sidenav-trigger" id="menu"><i class="material-icons">menu</i></a>
            <ul class="row hide-on-med-and-down">
                <div class="col s2"></div>
                <li class="col s4 l3 xl5 ">
                    <?= $this->Element('barrabusquedaform')?>
                </li>
               
                <?php
                    if($loggedIn):
                ?>
                    <li class="col s1 l1 xl1 right "><?= $this->Html->link(__('Salir'), ['controller'=>'CuentaUsuario', 'action' =>'logout']);?></li>
                    <li class="col s2 l2 xl2 right "><a class="dropdown-trigger" data-target="dropdown1">Menu de Usuario<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li class="col s1 l1 xl1 right"><a href="">Notimart</a></li>
                    
                <?php 
                    else:
                ?>
                     <li class="col s1 l1 xl1 right "><?= $this->Html->link(__('Login'), ['controller'=>'CuentaUsuario', 'action' =>'login']);?></li>
                     <li class="col s1 l1 xl1 right"><?= $this->Html->link(__('Registrarse'), ['controller'=>'PersonaNatural', 'action' =>'add']);?></li>
                     <li class="col s1 l1 xl1 right"><a href="">Notimart</a></li> 
                     
                <?php 
                    endif;
                    
                ?>

                 <!-- Faltan los links , hay que hacer el login para eso -->
                
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
