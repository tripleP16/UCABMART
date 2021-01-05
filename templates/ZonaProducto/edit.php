<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ZonaProducto $zonaProducto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $zonaProducto->prod_codigo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $zonaProducto->prod_codigo), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Zona Producto'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="zonaProducto form content">
            <?= $this->Form->create($zonaProducto) ?>
            <fieldset>
                <legend><?= __('Edit Zona Producto') ?></legend>
                <?php
                    echo $this->Form->control('zon_pro_cantidad_de_producto');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
