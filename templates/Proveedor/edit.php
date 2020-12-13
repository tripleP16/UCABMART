<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proveedor $proveedor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $proveedor->pro_rif],
                ['confirm' => __('Are you sure you want to delete # {0}?', $proveedor->pro_rif), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Proveedor'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="proveedor form content">
            <?= $this->Form->create($proveedor) ?>
            <fieldset>
                <legend><?= __('Edit Proveedor') ?></legend>
                <?php
                    echo $this->Form->control('pro_razon_social');
                    echo $this->Form->control('pro_denominacion_comercial');
                    echo $this->Form->control('pro_pagina_web');
                    echo $this->Form->control('pro_direccion_fisica');
                    echo $this->Form->control('pro_direccion_fiscal');
                    echo $this->Form->control('lugar');
                    echo $this->Form->control('lugar_fiscal');
                    echo $this->Form->control('rubro._ids', ['options' => $rubro]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
