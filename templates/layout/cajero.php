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
        <link rel="stylesheet" href="/UCABMART/css/cajero.css">
    
    
    <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
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
        if($privilegio == 'Cajero' ):
    ?>
        <li><?= $this->Html->link(__('Inicio'), ['controller'=>'cajero','action' => 'index']) ?></li>
   
    <?php
        if($privilegio == 'Jefe de Pasillo'):
    ?>
        <li><?= $this->Html->link(__('Ver Pasillos'), ['controller'=>'cajero','action' => 'pasillos']) ?></li>
    <?php endif?>
    </ul>
    <nav class="row  brown darken-2">
        <div class="nav-wrapper row">
            <a href="/UCABMART/" class="brand-logo"><img src="/UCABMART/img/logo.png" id="logo"></a>
            <ul class="right hide-on-med-and-down">
                <li><?= $this->Html->link(__('Volver Online'), ['controller'=>'Inicio', 'action' =>'index']);?></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">menu</i></a></li>
            </ul>

        </div>
    </nav>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </body>
</html>