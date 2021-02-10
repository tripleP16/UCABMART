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
            <?= $this->Html->link(__('List Orden De Compra'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ordenDeCompra form content">
            <?= $this->Form->create($ordenDeCompra) ?>
            <fieldset>
                <legend><?= __('Add Orden De Compra') ?></legend>
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
