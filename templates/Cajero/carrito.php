<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto[]|\Cake\Collection\CollectionInterface $producto
 */
?>

<div class="row">

<?= $this->Html->link(__('Realizar compra'), ['action' => 'pagar', $id, $check], ['class' => ' waves-effect yellow accent-2 btn-large black-text']) ?>



    <h3 class="white-text"><?= __('Carrito de compras') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio </th>


                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><img src="<?= h($query['prod_imagen']) ?>" style="width:200px;" alt=""></td>
                    <td><?= h($query['prod_nombre']) ?></td>
                    <td><?= h($query['car_unidades_producto']) ?></td>
                    <td><?= h($query['car_com_precio']) ?></td>
                    <td class="actions">
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $id, $check, $query['prod_codigo']],['class' => 'waves-effect red accent-2 btn-large white-text'], ['confirm' => __('Are you sure you want to delete # {0}?',$query['prod_codigo'])]) ?>
                       
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready( function () {
    $('#tiendas').DataTable({
        
    });
    $('select').formSelect();
    $('input').css('border-top','0px')
    $('input').css('border-left','0px')
    $('input').css('border-right','0px')
} );
</script>