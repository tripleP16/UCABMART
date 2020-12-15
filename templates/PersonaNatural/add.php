<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaNatural $personaNatural
 * @var \App\Model\Entity\Telefono $telefono
 * @var \App\Model\Entity\Lugar $lugares 
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
                
                'options'=>$lugares
            ));?>
                <label>Estado</label>
            </div>

            <div class=" input-field col s12">
            <?= $this->Form->control('municipio', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>$municipios
            ));?>
                <label>municipio</label>
            </div>
            <div class=" input-field col s12">
            <?= $this->Form->control('FK_lug_codigo', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>$parroquias
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
                
                'options'=>$tiendas
            ));?>
                <label>Tiendas</label>
            </div>
            <div class="divider"></div>
            <div class="section">
                <h5>Telefonos de Contacto</h5>
                <h6>Principal</h6>
                <div class=" input-field col s6">
                    <?= $this->Form->control('tel_tipo', array( 
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'select', 
                        
                        'options'=>['Celular', 'Local']
                     ));?>
                    <label>Tipo</label>
                </div>
                <div class=" input-field col inline s6"> 
                    <?php
                        echo $this->Form->control('tel_numero', array(
                            'placeholder'=>'04241405428',
                            'label'=> false, 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'number'
                    ));?>
                    <label for="tel_numero">Numero de Telefono</label>
                </div>
                <h6>Secundario</h6>
                <div class=" input-field col s6">
                    <?= $this->Form->control('tel_tipo', array( 
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'select', 
                        
                        'options'=>['Celular', 'Local']
                     ));?>
                    <label>Tipo</label>
                </div>
                <div class=" input-field col inline s6"> 
                    <?php
                        echo $this->Form->control('tel_numero', array(
                            'placeholder'=>'04241405428',
                            'label'=> false, 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'number'
                    ));?>
                    <label for="tel_numero">Numero de Telefono</label>
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
            <div class="row">
                <?= $this->Html->link(__('¿Eres persona Juridica? Registrate Aqui'), ['controller'=>'PersonaJuridica', 'action' =>'add']);?>
            </div>
            
        </div>
        
    </div>
</div>
