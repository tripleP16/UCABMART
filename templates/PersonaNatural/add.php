<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaNatural $personaNatural
 */
?>

<div class="row" >
        <?= $this->Form->create($personaNatural, array('class' =>'col s8 offset-s2 formulario')) ?>
        <div class="row formularioCont">
            <h5 class="center">Registro Persona Natural</h5>
            <div class=" input-field col inline s6"> 
                <?php
                    echo $this->Form->control('per_nat_cedula', array(
                            'placeholder'=>'27784169',
                            'label'=> false, 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'
                    ));?>
                <label for="per_nat_cedula">Cedula</label>
            </div>
            <div class=" input-field col inline s6"> 
                <?php
                    echo $this->Form->control('per_nat_rif', array(
                            'placeholder'=>'V-27784169-4',
                            'label'=> false, 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'
                    ));?>
                <label for="per_nat_rif">RIF</label>
            </div>
            <div class=" input-field col inline s6"> 
                <?php
                echo $this->Form->control('per_nat_primer_nombre',array(
                    'placeholder'=>'Pablo',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ) );?>
                <label for="per_nat_primer_nombre">Primer Nombre</label>
            </div>
            <div class=" input-field col inline s6"> 
                <?php
                echo $this->Form->control('per_nat_segundo_nombre',array(
                    'placeholder'=>'Miguel',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ) );?>
                <label for="per_nat_segundo_nombre">Segundo Nombre</label>
            </div>
            <div class=" input-field col inline s6"> 
                <?php
                echo $this->Form->control('per_nat_primer_apellido', array(
                    'placeholder'=>'Perez',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ));?>
                <label for="per_nat_primer_apellido">Primer Apellido</label>
            </div>
            <div class=" input-field col inline s6"> 
                <?php
                echo $this->Form->control('per_nat_segundo_apellido', array(
                    'placeholder'=>'Perez',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ));?>
                <label for="per_nat_segundo_apellido">Segundo Apellido</label>
            </div>
            <div class=" input-field col s12">
            <?= $this->Form->control('Estado', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione uno',
                'options'=>['Hay', 'Que', 'Poner', 'Estados']
            ));?>
                <label>Estado</label>
            </div>

            <div class=" input-field col s12">
            <?= $this->Form->control('Ciudad', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione uno',
                'options'=>['Hay', 'Que', 'Poner', 'Ciudades']
            ));?>
                <label>Ciudad</label>
            </div>
            <div class=" input-field col s12">
            <?= $this->Form->control('FK_lug_codigo', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione uno',
                'options'=>['Hay', 'Que', 'Poner', 'Parroquias']
            ));?>
                <label>Parroquia</label>
            </div>
            <div class=" input-field col inline s12">
                <?php
                echo $this->Form->control('per_nat_direccion', array(
                    'placeholder'=>'Av. Francisco Lazo Marti Edificio Delta Torre A apartamento 4B',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ));?>
                <label for="per_nat_direccion">Direccion</label>
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
                <br>
                <br>    
        <div class="divider"></div>
        <br>
        <br>
        <div class=" input-field col s12">
            <?= $this->Form->button(__('Registrarse') , array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
        </div>
        <?= $this->Form->end() ?>
        </div>
        
    </div>
</div>
