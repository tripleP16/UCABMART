<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdenDeCompra $ordenDeCompra
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Orden De Compra'), ['action' => 'edit', $ordenDeCompra->ord_com_numero], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Orden De Compra'), ['action' => 'delete', $ordenDeCompra->ord_com_numero], ['confirm' => __('Are you sure you want to delete # {0}?', $ordenDeCompra->ord_com_numero), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orden De Compra'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Orden De Compra'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ordenDeCompra view content">
            <h3><?= h($ordenDeCompra->ord_com_numero) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ord Com Pagada') ?></th>
                    <td><?= h($ordenDeCompra->ord_com_pagada) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Pro Rif') ?></th>
                    <td><?= h($ordenDeCompra->FK_pro_rif) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ord Com Numero') ?></th>
                    <td><?= $this->Number->format($ordenDeCompra->ord_com_numero) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Tie Codigo') ?></th>
                    <td><?= $this->Number->format($ordenDeCompra->FK_tie_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ord Com Fecha Creada') ?></th>
                    <td><?= h($ordenDeCompra->ord_com_fecha_creada) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ord Com Fecha Despacho') ?></th>
                    <td><?= h($ordenDeCompra->ord_com_fecha_despacho) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
