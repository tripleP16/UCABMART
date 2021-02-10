<div class="col s8 offset-s1" id="panelBuscar">
        <table id="tiendas" class="responsive-table centered highlight" >
            <thead>
                <tr>
                    <th>Imagen del Producto</th>
                    <th>Codigo del Producto</th>
                    <th>Nombre del Producto</th>
                    <th>Precio del Producto</th>
                    <th>Reponer Producto</th>
                </tr>
            </thead>
            <?php 
                foreach($productos as $producto):
            
            ?>
            <tbody>
            <tr>
                <td><img src="<?php echo $producto['prod_imagen']?>" class="circle imagen"></td>
                <td><?= h($producto['prod_codigo']) ?></td>
                <td><?= h($producto['prod_nombre']) ?></td>
                <td><?= $this->Number->format($producto['prod_precio_bolivar']) ?></td>
                <td><?= $this->Html->link(__('Reponer Producto'), ['action' => 'reponer', $producto['prod_codigo']], ['class' => ' waves-effect yellow accent-2 btn-large black-text']) ?></td>  
            </tr>
            </tbody>
        <?php endforeach; ?>
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

