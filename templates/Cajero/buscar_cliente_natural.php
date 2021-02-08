<div class="row">
    <div class="col s4 offset-s1" id="panelMadera">
        
        <div class="botonera white" style="padding: 5%;">
        
            <?= $this->Form->create(null, array('class' =>'col s8 offset-s2 formulario')) ?>
            <h5 class=" center">Buscar Cliente Existente</h5>
            <div class="row">
                <div class=" input-field col inline s12"> 
            
                    <?php
                    echo $this->Form->control('per_nat_cedula', array(
                            'placeholder'=>'27784169',
                            'label'=> 'Cedula', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
                </div>
                <div class="col inline s12 ">
                    <?= $this->Form->button(__('Buscar Cliente') , array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>       
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

