<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto[]|\Cake\Collection\CollectionInterface $producto
 */
?>
<div class="producto index content">
    <?= $this->Html->link(__('New Producto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Producto') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('prod_codigo') ?></th>
                    <th><?= $this->Paginator->sort('prod_nombre') ?></th>
                    <th><?= $this->Paginator->sort('prod_imagen') ?></th>
                    <th><?= $this->Paginator->sort('prod_precio_bolivar') ?></th>
                    <th><?= $this->Paginator->sort('FK_submarca') ?></th>
                    <th><?= $this->Paginator->sort('FK_proveedor') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($producto as $producto): ?>
                <tr>
                    <td><?= $this->Number->format($producto->prod_codigo) ?></td>
                    <td><?= h($producto->prod_nombre) ?></td>
                    <td><?= h($producto->prod_imagen) ?></td>
                    <td><?= $this->Number->format($producto->prod_precio_bolivar) ?></td>
                    <td><?= h($producto->FK_submarca) ?></td>
                    <td><?= h($producto->FK_proveedor) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $producto->prod_codigo]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $producto->prod_codigo]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $producto->prod_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->prod_codigo)]) ?>
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
