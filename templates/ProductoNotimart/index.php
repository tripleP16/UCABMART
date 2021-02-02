<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductoNotimart[]|\Cake\Collection\CollectionInterface $productoNotimart
 */
?>
<div class="row">
    <h3 class="white-text"><?= __('Productos a elegir') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion </th>
                    <th>Imagen</th>
                    <th>Submarca</th>

                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['prod_nombre']) ?></td>
                    <td><?= h($query['prod_precio_bolivar']) ?></td>
                    <td><?= h($query['prod_descripcion']) ?></td>
                    <td><?= h($query['prod_imagen']) ?></td>
                    <td><?= h($query['sub_nombre']) ?></td>
                    <td class="actions">
                    <?= $this->Html->link(__('Agregar al notimart'), ['action' => 'editar', $query['prod_codigo']], ['class'=>'waves-effect waves-light btn-small black-text ']) ?>
                       
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>