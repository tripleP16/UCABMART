<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proveedor[]|\Cake\Collection\CollectionInterface $proveedor
 */
?>
<div class="proveedor index content">
    <?= $this->Html->link(__('New Proveedor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Proveedor') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('pro_rif') ?></th>
                    <th><?= $this->Paginator->sort('pro_razon_social') ?></th>
                    <th><?= $this->Paginator->sort('pro_denominacion_comercial') ?></th>
                    <th><?= $this->Paginator->sort('pro_pagina_web') ?></th>
                    <th><?= $this->Paginator->sort('pro_direccion_fisica') ?></th>
                    <th><?= $this->Paginator->sort('pro_direccion_fiscal') ?></th>
                    <th><?= $this->Paginator->sort('lugar') ?></th>
                    <th><?= $this->Paginator->sort('lugar_fiscal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proveedor as $proveedor): ?>
                <tr>
                    <td><?= h($proveedor->pro_rif) ?></td>
                    <td><?= h($proveedor->pro_razon_social) ?></td>
                    <td><?= h($proveedor->pro_denominacion_comercial) ?></td>
                    <td><?= h($proveedor->pro_pagina_web) ?></td>
                    <td><?= h($proveedor->pro_direccion_fisica) ?></td>
                    <td><?= h($proveedor->pro_direccion_fiscal) ?></td>
                    <td><?= $this->Number->format($proveedor->lugar) ?></td>
                    <td><?= $this->Number->format($proveedor->lugar_fiscal) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $proveedor->pro_rif]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $proveedor->pro_rif]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $proveedor->pro_rif], ['confirm' => __('Are you sure you want to delete # {0}?', $proveedor->pro_rif)]) ?>
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
