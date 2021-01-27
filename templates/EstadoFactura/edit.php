<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EstadoFactura $estadoFactura
 */
?>

<div class="row">
    <?= $this->Form->create(array('class' =>'col s8 offset-s2 formulario')) ?>
    <h5 class="center">Editar Tienda</h5>
    <div class="row formularioCont">
                <?php
                    echo $this->Form->control('emp_primer_nombre', array("label"=>"Primer Nombre"));
                    echo $this->Form->control('emp_segundo_nombre', array("label"=>"Segundo Nombre"));
                    ?>
    </div>
</div>

