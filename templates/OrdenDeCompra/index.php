<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdenDeCompra[]|\Cake\Collection\CollectionInterface $ordenDeCompra
 */
?>
<div class="row">
    <h3 class="white-text"><?= __('Productos') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>Numero de orden de compra</th>
                    <th>Fecha de creacion</th>
                    <th>Fecha de despacho </th>
                    <th>Estado de la orden</th>
                    <th>RIF</th>

                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['ord_com_numero']) ?></td>
                    <td><?= h($query['ord_com_fecha_creada']) ?></td>
                    <td><?= h($query['ord_com_fecha_despacho']) ?></td>
                    <td><?= h($query['ord_com_pagada']) ?></td>
                    <td><?= h($query['FK_pro_rif']) ?></td>
                    <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view'], ['class'=>'waves-effect waves-light btn-small black-text ']) ?>
                       
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

                    



<script>
$(document).ready( function () {
    $('#tiendas').DataTable({
        
    });
    $('select').formSelect();
    $('input').css('border-top','0px')
    $('input').css('border-left','0px')
    $('input').css('border-right','0px')
} );
</script>