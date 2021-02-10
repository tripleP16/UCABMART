<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TarjetaDeCredito $tarjetaDeCredito
 */
?>
<div class="row">
<?= $this->Form->create($tarjetaDeCredito, array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont">   
        <h5 class="center">Agregar Tarjeta</h5>

        <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('met_pag_numero', array(
                                'placeholder'=>'8085895',
                                'label'=> 'Numero de Tarjeta', 
                                'templates'     => ['inputContainer' => '{{content}}'],
                                'type'=>'number'
                        ))?>
            </div>


            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('tar_cre_nombre', array(
                            'placeholder'=>'Nombre',
                            'label'=> 'Nombre del titular', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
            </div>

            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('tar_cre_fecha_emision',array('label'=>'Fecha de emision'))?>
            </div>

            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('tar_cre_cvv', array(
                            'placeholder'=>'000',
                            'label'=> 'CVV', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
            </div>

            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('tar_cre_tipo', array(
                            'placeholder'=>'MASTERCARD',
                            'label'=> 'Tipo de tarjeta (MASTERCARD)', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
            </div>

            
            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('FK_emi_codigo', array(
                            'placeholder'=>'Maximo de tarjetas a registar 5',
                            'label'=> 'Codigo', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
            </div>

            <div class=" input-field col s12">
            <?= $this->Form->button(__('Agregar Tarjeta') , array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
        </div>


            </div>
