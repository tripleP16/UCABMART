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
            <?= $this->Html->link(__('Edit Carrito De Compras Virtual'), ['action' => 'edit', $carritoDeComprasVirtual->prod_codigo], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Carrito De Compras Virtual'), ['action' => 'delete', $carritoDeComprasVirtual->prod_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $carritoDeComprasVirtual->prod_codigo), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Carrito De Compras Virtual'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Carrito De Compras Virtual'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carritoDeComprasVirtual view content">
            <h3><?= h($carritoDeComprasVirtual->prod_codigo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cue Usu Email') ?></th>
                    <td><?= h($carritoDeComprasVirtual->cue_usu_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prod Codigo') ?></th>
                    <td><?= $this->Number->format($carritoDeComprasVirtual->prod_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Car Unidades De Producto') ?></th>
                    <td><?= $this->Number->format($carritoDeComprasVirtual->car_unidades_de_producto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Car Com Precio') ?></th>
                    <td><?= $this->Number->format($carritoDeComprasVirtual->car_com_precio) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
