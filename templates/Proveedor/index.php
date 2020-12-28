<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proveedor[]|\Cake\Collection\CollectionInterface $proveedor
 */
?>
<div class="proveedor index content">
    <?= $this->Html->link(__('Crear Provedor'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3 class="white-text"><?= __('Proveedores') ?></h3>
    <div class="white">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('RIF') ?></th>
                    <th><?= $this->Paginator->sort('Razon Social') ?></th>
                    <th><?= $this->Paginator->sort('Denominacion Comercial') ?></th>
                    <th><?= $this->Paginator->sort('Pagina Web') ?></th>
                    <th><?= $this->Paginator->sort('Direccion Fisica') ?></th>
                    <th><?= $this->Paginator->sort('Direccion Fiscal') ?></th>
                    <th><?= $this->Paginator->sort('Codigo Fisico') ?></th>
                    <th><?= $this->Paginator->sort('Codigo Fiscal') ?></th>
                    <th class="actions"><?= __('Opciones') ?></th>
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
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $proveedor->pro_rif]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $proveedor->pro_rif]) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $proveedor->pro_rif], ['confirm' => __('Are you sure you want to delete # {0}?', $proveedor->pro_rif)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator white">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultima') . ' >>') ?>
        </ul>
    </div>
</div>
