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
            <?= $this->Html->link(__('Edit Zona Producto'), ['action' => 'edit', $zonaProducto->prod_codigo], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Zona Producto'), ['action' => 'delete', $zonaProducto->prod_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $zonaProducto->prod_codigo), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Zona Producto'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Zona Producto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="zonaProducto view content">
            <h3><?= h($zonaProducto->prod_codigo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Prod Codigo') ?></th>
                    <td><?= $this->Number->format($zonaProducto->prod_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zon Codigo') ?></th>
                    <td><?= $this->Number->format($zonaProducto->zon_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zon Pro Cantidad De Producto') ?></th>
                    <td><?= $this->Number->format($zonaProducto->zon_pro_cantidad_de_producto) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
