<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ZonaProducto[]|\Cake\Collection\CollectionInterface $zonaProducto
 */
?>
<div class="zonaProducto index content">
    <?= $this->Html->link(__('New Zona Producto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Zona Producto') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('prod_codigo') ?></th>
                    <th><?= $this->Paginator->sort('zon_codigo') ?></th>
                    <th><?= $this->Paginator->sort('zon_pro_cantidad_de_producto') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($zonaProducto as $zonaProducto): ?>
                <tr>
                    <td><?= $this->Number->format($zonaProducto->prod_codigo) ?></td>
                    <td><?= $this->Number->format($zonaProducto->zon_codigo) ?></td>
                    <td><?= $this->Number->format($zonaProducto->zon_pro_cantidad_de_producto) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $zonaProducto->prod_codigo]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $zonaProducto->prod_codigo]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $zonaProducto->prod_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $zonaProducto->prod_codigo)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
