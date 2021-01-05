<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Zona $zona
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Zona'), ['action' => 'edit', $zona->zon_codigo], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Zona'), ['action' => 'delete', $zona->zon_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $zona->zon_codigo), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Zona'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Zona'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="zona view content">
            <h3><?= h($zona->zon_codigo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Zon Nombre') ?></th>
                    <td><?= h($zona->zon_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zon Refrigeracion') ?></th>
                    <td><?= h($zona->zon_refrigeracion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zon Codigo') ?></th>
                    <td><?= $this->Number->format($zona->zon_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zon Capacidad') ?></th>
                    <td><?= $this->Number->format($zona->zon_capacidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Alm Codigo') ?></th>
                    <td><?= $this->Number->format($zona->FK_alm_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Rub Codigo') ?></th>
                    <td><?= $this->Number->format($zona->FK_rub_codigo) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Pasillo') ?></h4>
                <?php if (!empty($zona->pasillo)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Pas Numero') ?></th>
                            <th><?= __('Pas Refrigeración') ?></th>
                            <th><?= __('FK Tie Codigo') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($zona->pasillo as $pasillo) : ?>
                        <tr>
                            <td><?= h($pasillo->pas_numero) ?></td>
                            <td><?= h($pasillo->pas_refrigeración) ?></td>
                            <td><?= h($pasillo->FK_tie_codigo) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Pasillo', 'action' => 'view', $pasillo->pas_numero]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Pasillo', 'action' => 'edit', $pasillo->pas_numero]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pasillo', 'action' => 'delete', $pasillo->pas_numero], ['confirm' => __('Are you sure you want to delete # {0}?', $pasillo->pas_numero)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Producto') ?></h4>
                <?php if (!empty($zona->producto)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Prod Codigo') ?></th>
                            <th><?= __('Prod Nombre') ?></th>
                            <th><?= __('Prod Descripcion') ?></th>
                            <th><?= __('Prod Imagen') ?></th>
                            <th><?= __('Prod Precio Bolivar') ?></th>
                            <th><?= __('FK Submarca') ?></th>
                            <th><?= __('FK Proveedor') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($zona->producto as $producto) : ?>
                        <tr>
                            <td><?= h($producto->prod_codigo) ?></td>
                            <td><?= h($producto->prod_nombre) ?></td>
                            <td><?= h($producto->prod_descripcion) ?></td>
                            <td><?= h($producto->prod_imagen) ?></td>
                            <td><?= h($producto->prod_precio_bolivar) ?></td>
                            <td><?= h($producto->FK_submarca) ?></td>
                            <td><?= h($producto->FK_proveedor) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Producto', 'action' => 'view', $producto->prod_codigo]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Producto', 'action' => 'edit', $producto->prod_codigo]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Producto', 'action' => 'delete', $producto->prod_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->prod_codigo)]) ?>
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
