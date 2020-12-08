<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaJuridica $personaJuridica
 */
?>
<div class="row">
    <?= $this->Form->create($personaJuridica, array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont">      
        <h5 class="center">Registro Persona Juridica</h5>
        <div class=" input-field col inline s6"> 
            <?php
                echo $this->Form->control('per_jur_rif', array(
                    'placeholder'=>'J-00006372-9',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'text'
            ) );?>
            <label for="per_jur_rif">RIF</label>
        </div>
        <div class=" input-field col inline s6"> 
            <?php
                echo $this->Form->control('per_jur_denominacion_comercial', array(
                    'placeholder'=>'C.A. Pepsi-Cola Venezuela',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'text'
            ) );?>
            <label for="per_jur_denominacion_comercial">Denominacion Comercial</label>
        </div>
        <div class=" input-field col inline s6"> 
            <?php
                echo $this->Form->control('per_jur_razon_social',array(
                    'placeholder'=>'Belkys Luna y Asociados',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'text'
            ) );?>
            <label for="per_jur_razon_social">Razon Social</label>
        </div>
        <div class=" input-field col inline s6"> 
            <?php
                echo $this->Form->control('per_jur_pagina_web',array(
                    'placeholder'=>'https://empresaspolar.com/',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'text'
            ) );?>
            <label for="per_jur_pagina_web">Pagina Web</label>
        </div>
        <div class=" input-field col inline s12"> 
            <?php
                echo $this->Form->control('per_jur_capital_disponible',array(
                    'placeholder'=>'50000000.65',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'number'
            ) );?>
            <label for="per_jur_capital_disponible">Capital Disponible en Bolivares</label>
        </div>   
        <div class="divider"></div>
        <div class="section">
            <h5>Direccion Fiscal</h5>
            <div class=" input-field col s12">
            <?= $this->Form->control('Estado', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione uno',
                'options'=>['Hay', 'Que', 'Poner', 'Estados']
            ));?>
                <label for="Estado">Estado</label>
            </div>

            <div class=" input-field col s12">
            <?= $this->Form->control('Ciudad', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione uno',
                'options'=>['Hay', 'Que', 'Poner', 'Ciudades']
            ));?>
                <label for="Ciudad">Ciudad</label>
            </div>
            <div class=" input-field col s12">
            <?= $this->Form->control('lugar', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione uno',
                'options'=>['Hay', 'Que', 'Poner', 'Parroquias']
            ));?>
                <label for="lugar">Parroquia</label>
            </div>
            <div class=" input-field col s12">
                <?php
                    echo $this->Form->control('per_jur_direccion_fiscal', array(
                        'placeholder'=>'Av. Francisco Lazo Marti Edificio Delta Torre A apartamento 4B',
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type' =>'text'
                    ));?>
                <label for="per_jur_direccion_fiscal">Direccion Fiscal</label>
            </div>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>Direccion Fiscal Principal</h5>
            <div class=" input-field col s12">
            <?= $this->Form->control('Estado', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione uno',
                'options'=>['Hay', 'Que', 'Poner', 'Estados']
            ));?>
                <label for="Estado">Estado</label>
            </div>

            <div class=" input-field col s12">
            <?= $this->Form->control('Ciudad', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione uno',
                'options'=>['Hay', 'Que', 'Poner', 'Ciudades']
            ));?>
                <label for="Ciudad">Ciudad</label>
            </div>
            <div class=" input-field col s12">
            <?= $this->Form->control('lugar_fiscal', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione uno',
                'options'=>['Hay', 'Que', 'Poner', 'Parroquias']
            ));?>
                <label for="lugar">Parroquia</label>
            </div>
            <div class=" input-field col s12">
                <?php
                    echo $this->Form->control('per_jur_direccion_fiscal_principal', array(
                        'placeholder'=>'Av. Francisco Lazo Marti Edificio Delta Torre A apartamento 4B',
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type' =>'text'
                    ));?>
                <label for="per_jur_direccion_fiscal_principal">Direccion Fiscal Principal</label>
            </div>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>Cuenta de Usuario</h5>
            <div class=" input-field col inline s6"> 
                <?php
                echo $this->Form->control('cue_usu_email', array(
                    'placeholder'=>'franco@gmail.com',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'email'
                ));?>
                <label for="cue_usu_email">Email</label>
            </div>
            <div class=" input-field col inline s6"> 
                <?php
                echo $this->Form->control('cue_usu_contrasena', array(
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'password'
                ));?>
                <label for="cue_usu_contrasena">Contraseña</label>
            </div>
            <div class=" input-field col s12">
            <?= $this->Form->control('FK_tie_codigo', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione uno',
                'options'=>['Hay', 'Que', 'Poner', 'Tiends']
            ));?>
                <label>Tiendas</label>
            </div>
        </div>
        <div class=" input-field col s12">
            <?= $this->Form->button(__('Registrarse') , array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
        </div>
            <?= $this->Form->end() ?>
            <div class="row">
                <?= $this->Html->link(__('¿Eres persona Natural? Registrate Aqui'), ['controller'=>'PersonaNatural', 'action' =>'add']);?>
            </div>
    </div>
</div>
