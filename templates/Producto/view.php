<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>


<table class='offset-s2 formulario'>


<tr>
    <td rowspan="6"><img class="activator" src="/UCABMART/img/cebolla.jpg"></td>
    <td><?= h($producto->prod_nombre) ?></td>
</tr>

<tr>
<td>Descripcion:<?= h($producto->prod_descripcion) ?></td>
</tr>


<tr>
<td>Precio en bolivares:<?= h($producto->prod_precio_bolivar)  ?>Bs</td>
</tr>

<tr>
<td>Submarca asociada:<a href="http://localhost/UCABMART/"><?= h($producto->FK_submarca) ?></a></td>
</tr>

<tr>
<td>Codigo del producto:<?= h($producto->prod_codigo) ?></td>
</tr>

<tr>
  <td><?= $this->Html->link(__('Agregar al carrito'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?></td>
</tr>


</table>