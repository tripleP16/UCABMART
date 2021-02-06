<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductoNotimart $productoNotimart
 */
?>
<div class="row">
    <?= $this->Form->create($productoNotimart, array('class' =>'col s8 offset-s2 formulario')) ?>
    <h5 class="center">Editar Tienda</h5>
    <div class="row formularioCont">
                <?php
                    echo $this->Form->control('prod_not_descuento', array("label"=>"Segundo Nombre"));
                    echo $this->Form->control('prod_not_fecha_inicio', array("label"=>"Primer Apellido"));
                    echo $this->Form->control('prod_not_fecha_FIN', array("label"=>"Segundo Apellido"));
                    echo $this->Form->control('FK_prod_codigo', array("label"=>"Direccion"));
                ?>