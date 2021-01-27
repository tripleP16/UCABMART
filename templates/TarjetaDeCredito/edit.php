<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TarjetaDeCredito $tarjetaDeCredito
 */
?>
<div class="row">
    <?= $this->Form->create($tarjetaDeCredito,  array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont">
    <h4 class="center">Editar Tarjeta</h4>
            <?php
                    echo $this->Form->control('tar_cre_nombre',array('label'=>'Nombre del titular'));
                    echo $this->Form->control('tar_cre_fecha_emision',array('label'=>'Fecha de emision'));
                    echo $this->Form->control('tar_cre_cvv',array('label'=>'CVV'));
                    echo $this->Form->control('tar_cre_tipo',array('label'=>'Tipo de tarjeta (MASTERCARD)'));
                    echo $this->Form->control('FK_emi_codigo',array('label'=>'Codigo'));


                ?>
        <?= $this->Form->button(__('Editar Tarjeta'), array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>

    </div>

    </div>


