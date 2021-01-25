<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto[]|\Cake\Collection\CollectionInterface $producto
 */
?>

<div class="row">
<?= $this->Html->link(__('Realizar compra'), ['action' => 'carrito'], ['class' => ' waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3 class="white-text"><?= __('Carrito de compras') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>Prueba</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio </th>


                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['prod_codigo']) ?></td>
                    <td><?= h($query['car_unidades_de_producto']) ?></td>
                    <td><?= h($query['car_com_precio']) ?></td>
                    <td class="actions">
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $query['prod_codigo']],['class' => 'waves-effect red accent-2 btn-large white-text'], ['confirm' => __('Are you sure you want to delete # {0}?',$query['prod_codigo'])]) ?>
                       
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>