<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto[]|\Cake\Collection\CollectionInterface $producto
 */
?>

<div class="row">
    <h3 class="white-text"><?= __('Productos') ?></h3>
    <?= $this->Html->link(__('Ver Carrito'), ['controller'=>'CarritoDeComprasVirtual','action' => 'index'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>  
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion </th>
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
                    <td><?= h($query['sub_nombre']) ?></td>
                    <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $query['prod_codigo']], ['class'=>'waves-effect waves-light btn-small black-text ']) ?>
                       
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
