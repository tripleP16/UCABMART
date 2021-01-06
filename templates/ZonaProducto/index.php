<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ZonaProducto[]|\Cake\Collection\CollectionInterface $zonaProducto
 */
?>
<div class="row white" >
    
    <div class="col s10 offset-s1 " id="inventarioCont">
        <h3 class="center">Almacen</h3>
        <table id="inventario" class="responsive-table centered highlight" >
            <thead>
                <tr>
                    <th>Tienda</th>
                    <th>Zona del Almacen</th>
                    <th>Nombre del Producto</th>
                    <th>Cantidad del Producto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['tie_direccion']) ?></td>
                    <td><?= h(strtoupper($query['zon_nombre'])) ?></td>
                    <td><?= h($query['prod_nombre']) ?></td>
                    <td><?= $this->Number->format($query['zon_pro_cantidad_de_producto']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
   
</div>
<script>
$(document).ready( function () {
    $('#inventario').DataTable({
        
    });
    $('select').formSelect();
    $('input').css('border-top','0px')
    $('input').css('border-left','0px')
    $('input').css('border-right','0px')
} );
</script>
