<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarritoDeComprasVirtual $carritoDeComprasVirtual
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Carrito De Compras Virtual'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carritoDeComprasVirtual form content">
            <?= $this->Form->create($carritoDeComprasVirtual) ?>
            <fieldset>
                <legend><?= __('Add Carrito De Compras Virtual') ?></legend>
                <?php
                    echo $this->Form->control('car_unidades_de_producto');
                    echo $this->Form->control('car_com_precio');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
