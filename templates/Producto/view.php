<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Producto'), ['action' => 'edit', $producto->prod_codigo], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Producto'), ['action' => 'delete', $producto->prod_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->prod_codigo), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Producto'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Producto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="producto view content">
            <h3><?= h($producto->prod_codigo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Prod Nombre') ?></th>
                    <td><?= h($producto->prod_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prod Imagen') ?></th>
                    <td><?= h($producto->prod_imagen) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Submarca') ?></th>
                    <td><?= h($producto->FK_submarca) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Proveedor') ?></th>
                    <td><?= h($producto->FK_proveedor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prod Codigo') ?></th>
                    <td><?= $this->Number->format($producto->prod_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prod Precio Bolivar') ?></th>
                    <td><?= $this->Number->format($producto->prod_precio_bolivar) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Prod Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($producto->prod_descripcion)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Factura') ?></h4>
                <?php if (!empty($producto->factura)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Fac Numero') ?></th>
                            <th><?= __('Fac Fecha Hora') ?></th>
                            <th><?= __('FK Mon Codigo') ?></th>
                            <th><?= __('FK Dir En Codigo') ?></th>
                            <th><?= __('FK Persona Natural') ?></th>
                            <th><?= __('FK Persona Juridica') ?></th>
                            <th><?= __('FK Cuenta Usuario') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($producto->factura as $factura) : ?>
                        <tr>
                            <td><?= h($factura->fac_numero) ?></td>
                            <td><?= h($factura->fac_fecha_hora) ?></td>
                            <td><?= h($factura->FK_mon_codigo) ?></td>
                            <td><?= h($factura->FK_dir_en_codigo) ?></td>
                            <td><?= h($factura->FK_persona_natural) ?></td>
                            <td><?= h($factura->FK_persona_juridica) ?></td>
                            <td><?= h($factura->FK_cuenta_usuario) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Factura', 'action' => 'view', $factura->fac_numero]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Factura', 'action' => 'edit', $factura->fac_numero]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Factura', 'action' => 'delete', $factura->fac_numero], ['confirm' => __('Are you sure you want to delete # {0}?', $factura->fac_numero)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Pasillo') ?></h4>
                <?php if (!empty($producto->pasillo)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Pas Numero') ?></th>
                            <th><?= __('Pas Refrigeración') ?></th>
                            <th><?= __('FK Tie Codigo') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($producto->pasillo as $pasillo) : ?>
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
                <h4><?= __('Related Notimart') ?></h4>
                <?php if (!empty($producto->notimart)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Not Codigo') ?></th>
                            <th><?= __('Not Fecha De Emision') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($producto->notimart as $notimart) : ?>
                        <tr>
                            <td><?= h($notimart->not_codigo) ?></td>
                            <td><?= h($notimart->not_fecha_de_emision) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Notimart', 'action' => 'view', $notimart->not_codigo]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Notimart', 'action' => 'edit', $notimart->not_codigo]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notimart', 'action' => 'delete', $notimart->not_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $notimart->not_codigo)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Zona') ?></h4>
                <?php if (!empty($producto->zona)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Zon Codigo') ?></th>
                            <th><?= __('Zon Nombre') ?></th>
                            <th><?= __('Zon Refrigeracion') ?></th>
                            <th><?= __('Zon Capacidad') ?></th>
                            <th><?= __('FK Alm Codigo') ?></th>
                            <th><?= __('FK Rub Codigo') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($producto->zona as $zona) : ?>
                        <tr>
                            <td><?= h($zona->zon_codigo) ?></td>
                            <td><?= h($zona->zon_nombre) ?></td>
                            <td><?= h($zona->zon_refrigeracion) ?></td>
                            <td><?= h($zona->zon_capacidad) ?></td>
                            <td><?= h($zona->FK_alm_codigo) ?></td>
                            <td><?= h($zona->FK_rub_codigo) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Zona', 'action' => 'view', $zona->zon_codigo]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Zona', 'action' => 'edit', $zona->zon_codigo]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Zona', 'action' => 'delete', $zona->zon_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $zona->zon_codigo)]) ?>
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
