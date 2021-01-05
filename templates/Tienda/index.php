<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tienda[]|\Cake\Collection\CollectionInterface $tienda
 */
?>
<div class="tienda index content">
    <?= $this->Html->link(__('Crear Tienda'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3 class="white-text"><?= __('Tiendas') ?></h3>
    <div class="white">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('tie_codigo') ?></th>
                    <th><?= $this->Paginator->sort('tie_direccion') ?></th>
                    <th><?= $this->Paginator->sort('Rif') ?></th>
                    <th><?= $this->Paginator->sort('Codigo de Almacen') ?></th>
                    <th><?= $this->Paginator->sort('Codigo de lugar') ?></th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tienda as $tienda): ?>
                <tr>
                    <td><?= $this->Number->format($tienda->tie_codigo) ?></td>
                    <td><?= h($tienda->tie_direccion) ?></td>
                    <td><?= h($tienda->tie_rif) ?></td>
                    <td><?= $this->Number->format($tienda->FK_alm_codigo) ?></td>
                    <td><?= $this->Number->format($tienda->FK_lug_codigo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['controller'=>'ZonaProducto', 'action' => 'index', $tienda->tie_codigo]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tienda->tie_codigo]) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $tienda->tie_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $tienda->tie_codigo)]) ?>
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
