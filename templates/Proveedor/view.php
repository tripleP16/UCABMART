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
            <?= $this->Html->link(__('Edit Proveedor'), ['action' => 'edit', $proveedor->pro_rif], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Proveedor'), ['action' => 'delete', $proveedor->pro_rif], ['confirm' => __('Are you sure you want to delete # {0}?', $proveedor->pro_rif), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Proveedor'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Proveedor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="proveedor view content">
            <h3><?= h($proveedor->pro_rif) ?></h3>
            <table>
                <tr>
                    <th><?= __('Pro Rif') ?></th>
                    <td><?= h($proveedor->pro_rif) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pro Razon Social') ?></th>
                    <td><?= h($proveedor->pro_razon_social) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pro Denominacion Comercial') ?></th>
                    <td><?= h($proveedor->pro_denominacion_comercial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pro Pagina Web') ?></th>
                    <td><?= h($proveedor->pro_pagina_web) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pro Direccion Fisica') ?></th>
                    <td><?= h($proveedor->pro_direccion_fisica) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pro Direccion Fiscal') ?></th>
                    <td><?= h($proveedor->pro_direccion_fiscal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lugar') ?></th>
                    <td><?= $this->Number->format($proveedor->lugar) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lugar Fiscal') ?></th>
                    <td><?= $this->Number->format($proveedor->lugar_fiscal) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Rubro') ?></h4>
                <?php if (!empty($proveedor->rubro)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Rub Codigo') ?></th>
                            <th><?= __('Rub Tipo') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($proveedor->rubro as $rubro) : ?>
                        <tr>
                            <td><?= h($rubro->rub_codigo) ?></td>
                            <td><?= h($rubro->rub_tipo) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Rubro', 'action' => 'view', $rubro->rub_codigo]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Rubro', 'action' => 'edit', $rubro->rub_codigo]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rubro', 'action' => 'delete', $rubro->rub_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $rubro->rub_codigo)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
