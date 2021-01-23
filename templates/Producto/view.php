<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>


<table class='offset-s2 formulario'>


<tr>
    <td rowspan="7"><img class="activator" src="/UCABMART/img/cebolla.jpg"></td>
    <td><?= h($producto->prod_nombre) ?></td>
</tr>

<tr>
<td><b>Descripcion:</b><?= h($producto->prod_descripcion) ?></td>
</tr>


<tr>
<td><b>Precio en bolivares:</b><?= h($producto->prod_precio_bolivar)  ?>Bs</td>
</tr>

<tr>
<td><b>Submarca asociada:</b><a href="http://localhost/UCABMART/"><?= h($producto->FK_submarca) ?></a></td>
</tr>

<tr>
<td><b>Codigo del producto:</b><?= h($producto->prod_codigo) ?></td>
</tr>

<tr>
<td>            <div class=" input-field col inline s12"> 
                <?php
                    echo $this->Form->control('prod_codigo', array(
                            'placeholder'=>'00',
                            'label'=> 'Cantidad', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
            </div><b>Cantidad maxima actual 9000</b></td>
</tr>


<tr>
  <td><?= $this->Html->link(__('Agregar al carrito'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?></td>
</tr>


</table>