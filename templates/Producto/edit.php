<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $producto->prod_codigo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $producto->prod_codigo), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Producto'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="producto form content">
            <?= $this->Form->create($producto) ?>
            <fieldset>
                <legend><?= __('Edit Producto') ?></legend>
                <?php
                    echo $this->Form->control('prod_nombre');
                    echo $this->Form->control('prod_descripcion');
                    echo $this->Form->control('prod_imagen');
                    echo $this->Form->control('prod_precio_bolivar');
                    echo $this->Form->control('FK_submarca');
                    echo $this->Form->control('FK_proveedor');
                    echo $this->Form->control('factura._ids', ['options' => $factura]);
                    echo $this->Form->control('pasillo._ids', ['options' => $pasillo]);
                    echo $this->Form->control('notimart._ids', ['options' => $notimart]);
                    echo $this->Form->control('zona._ids', ['options' => $zona]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
