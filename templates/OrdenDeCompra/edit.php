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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ordenDeCompra->ord_com_numero],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ordenDeCompra->ord_com_numero), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Orden De Compra'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ordenDeCompra form content">
            <?= $this->Form->create($ordenDeCompra) ?>
            <fieldset>
                <legend><?= __('Edit Orden De Compra') ?></legend>
                <?php
                    echo $this->Form->control('ord_com_fecha_creada');
                    echo $this->Form->control('ord_com_fecha_despacho', ['empty' => true]);
                    echo $this->Form->control('ord_com_pagada');
                    echo $this->Form->control('FK_pro_rif');
                    echo $this->Form->control('FK_tie_codigo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
