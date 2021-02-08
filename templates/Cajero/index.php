<div class="row">
    <div class="col s4 offset-s1" id="panelMadera">
        <div class="botonera">
            <?= $this->Html->link(__('Cliente Nuevo' ), ['action' => 'anadirCliente'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
            <br>
            <br>
            <br>
            <?= $this->Html->link(__('Cliente Existente'), ['action' => 'buscarClienteNatural'], ['class' => 'waves-effect waves-light btn-large black-text ']) ?>
        </div>
        
    </div>
    <div class="col s6 offset-s1" id="panelBuscar">
        <table id="tiendas" class="responsive-table centered highlight" >
            <thead>
                <tr>
                    <th>Imagen del Producto</th>
                    <th>Codigo del Producto</th>
                    <th>Nombre del Producto</th>
                    <th>Precio del Producto</th>
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

