<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TarjetaDeDebito $tarjetaDeDebito
 */
?>
?>
<div class="row">
    <?= $this->Form->create($tarjetaDeDebito,  array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont">
    <h4 class="center">Editar Tarjeta</h4>
            <?php
                    echo $this->Form->control('tar_deb_titular',array('label'=>'Titular de la tarjeta'));
                    echo $this->Form->control('tar_deb_fecha_emision',array('label'=>'Fecha de emision'));
                    echo $this->Form->control('tar_deb_cvv',array('label'=>'CVV'));
                    echo $this->Form->control('tar_deb_tipo_cuenta',array('label'=>'Tipo de cuenta (Ahorro o Corriente)'));
                    echo $this->Form->control('tar_deb_tipo',array('label'=>'Tipo de tarjeta (Visa o Maestro)'));
                    echo $this->Form->control('FK_emi_codigo',array('label'=>'Codigo'));


                ?>

<?= $this->Form->button(__('Editar Tarjeta'), array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
    </div>

    </div>
