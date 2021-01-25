<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TarjetaDeDebito $tarjetaDeDebito
 */
?>
<div class="row">
<?= $this->Form->create($tarjetaDeDebito, array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont">   
        <h5 class="center">Agregar Tarjeta</h5>

        <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('met_pag_numero')?>
            </div>


            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('tar_deb_nombre', array(
                            'placeholder'=>'Nombre',
                            'label'=> 'Nombre del titular', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
            </div>

            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('tar_deb_fecha_emision')?>
            </div>

            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('tar_deb_cvv', array(
                            'placeholder'=>'000',
                            'label'=> 'CVV', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
            </div>

            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('tar_deb_tipo_cuenta', array(
                            'placeholder'=>'Ahorro o Corriente',
                            'label'=> 'Cuenta', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
            </div>

            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('tar_deb_tipo', array(
                            'placeholder'=>'MAESTRO',
                            'label'=> 'Tipo de tarjeta', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
            </div>

            
            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('FK_emi_codigo', array(
                            'placeholder'=>'Maximo de tarjetas a registar 5',
                            'label'=> 'Maximo de tarjetas a registar 5', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
            </div>

            <div class=" input-field col s12">
            <?= $this->Form->button(__('Agregar Tarjeta') , array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
        </div>


            </div>


