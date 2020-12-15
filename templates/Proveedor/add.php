<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proveedor $proveedor
 */
?>
<div class="row">  
    <?= $this->Form->create($proveedor, array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont">
        <h4 class="center">Registro Proveedor</h4>
        <div class="divider"></div>
        <div class="section">
            <h5>Datos de Registro</h5>
            <div class=" input-field col inline s6"> 
                    <?php
                        echo $this->Form->control('pro_rif', array(
                            'placeholder'=>'J-27784169-4',
                            'label'=> false, 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'
                        ));?>
                    <label for="pro_rif">RIF</label>
            </div>
            <div class=" input-field col inline s6"> 
                <?php
                    echo $this->Form->control('pro_razon_social',array(
                        'placeholder'=>'Belkys Luna y Asociados',
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'text'
                ) );?>
                <label for="pro_razon_social">Razon Social</label>
            </div>
            <div class=" input-field col inline s6"> 
                <?php
                    echo $this->Form->control('pro_denominacion_comercial', array(
                        'placeholder'=>'C.A. Pepsi-Cola Venezuela',
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'text'
                ) );?>
                <label for="pro_denominacion_comercial">Denominacion Comercial</label>
            </div>
            <div class=" input-field col inline s6"> 
                <?php
                echo $this->Form->control('pro_pagina_web',array(
                    'placeholder'=>'https://empresaspolar.com/',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'text'
            ) );?>
            <label for="pro_pagina_web">Pagina Web</label>
            </div>
            <div class=" input-field col inline s12"> 
                <?php
                echo $this->Form->control('rubro._ids',array( 
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'select', 
                    'multiple'=>true,
                    
                    'options'=>['Hay', 'Que', 'Poner', 'Rubros']
                ));?>
                <label for="rubro._ids">Rubros</label>
            </div>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>Direccion Fisica</h5>
            <div class=" input-field col s12">
            <?= $this->Form->control('Estado', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>['Hay', 'Que', 'Poner', 'Estados']
            ));?>
                <label for="Estado">Estado</label>
            </div>

            <div class=" input-field col s12">
            <?= $this->Form->control('municipio', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>['Hay', 'Que', 'Poner', 'municipios']
            ));?>
                <label for="municipio">municipio</label>
            </div>
            <div class=" input-field col s12">
            <?= $this->Form->control('lugar', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>['Hay', 'Que', 'Poner', 'Parroquias']
            ));?>
                <label for="lugar">Parroquia</label>
            </div>
            <div class=" input-field col s12">
                <?php
                    echo $this->Form->control('pro_direccion_fisica', array(
                        'placeholder'=>'Av. Francisco Lazo Marti Edificio Delta Torre A apartamento 4B',
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type' =>'text'
                    ));?>
                <label for="pro_direccion_fisica">Direccion Fisica</label>
            </div>
        </div>              
        <div class="divider"></div>
        <div class="section">
            <h5>Direccion Fiscal</h5>
            <div class=" input-field col s12">
            <?= $this->Form->control('Estado', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>['Hay', 'Que', 'Poner', 'Estados']
            ));?>
                <label for="Estado">Estado</label>
            </div>

            <div class=" input-field col s12">
            <?= $this->Form->control('municipio', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>['Hay', 'Que', 'Poner', 'municipios']
            ));?>
                <label for="municipio">municipio</label>
            </div>
            <div class=" input-field col s12">
            <?= $this->Form->control('lugar_fiscal', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>['Hay', 'Que', 'Poner', 'Parroquias']
            ));?>
                <label for="lugar_fiscal">Parroquia</label>
            </div>
            <div class=" input-field col s12">
                <?php
                    echo $this->Form->control('pro_direccion_fiscal', array(
                        'placeholder'=>'Av. Francisco Lazo Marti Edificio Delta Torre A apartamento 4B',
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type' =>'text'
                    ));?>
                <label for="pro_direccion_fiscal">Direccion Fiscal</label>
            </div>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>Informacion de Contacto</h5>
            <h6>Dias de Atencion</h6>
            <div class=" input-field col s6">
            <?= $this->Form->control('desde', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo']
            ));?>
            <label for="desde">Desde</label>
                
            </div>
            <div class=" input-field col s6">
            <?= $this->Form->control('hasta', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo']
            ));?>
            <label for="hasta">Hasta</label>
        </div>
            <h6>Horas de Atencion</h6>
            <div class=" input-field col s6">
            <?= $this->Form->control('desdeHora', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>['7am','8am','9am','10am','11am','12m','1pm','2pm','3pm','4pm','5pm','6pm','7pm']
            ));?>
            <label for="desdeHora">Desde </label>
                
            </div>
            <div class=" input-field col s6">
            <?= $this->Form->control('hasta', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>['7am','8am','9am','10am','11am','12m','1pm','2pm','3pm','4pm','5pm','6pm','7pm']
            ));?>
            <label for="hasta">Hasta</label>
            
            </div>
            <h6>Personal de Contacto</h6>
            <h6>Principal</h6>
            <div class=" input-field col s3"> 
                <?php
                echo $this->Form->control('per_con_nombre',array(
                    'placeholder'=>'Pablo',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ) );?>
                <label for="per_con_nombre">Nombre</label>
            </div>
            <div class=" input-field col s3"> 
                <?php
                echo $this->Form->control('per_con_apellido',array(
                    'placeholder'=>'Perez',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ) );?>
                <label for="per_con_apellido">Apellido</label>
            </div>
                <div class=" input-field col s3">
                    <?= $this->Form->control('tel_tipo', array( 
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'select', 
                        
                        'options'=>['Celular', 'Local']
                     ));?>
                    <label>Tipo</label>
                </div>
                <div class=" input-field col inline s3"> 
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
            <div class=" input-field col s3"> 
                <?php
                echo $this->Form->control('per_con_nombre',array(
                    'placeholder'=>'Pablo',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ) );?>
                <label for="per_con_nombre">Nombre</label>
            </div>
            <div class=" input-field col s3"> 
                <?php
                echo $this->Form->control('per_con_apellido',array(
                    'placeholder'=>'Perez',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ) );?>
                <label for="per_con_apellido">Apellido</label>
            </div>
                <div class=" input-field col s3">
                    <?= $this->Form->control('tel_tipo', array( 
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'select', 
                        
                        'options'=>['Celular', 'Local']
                     ));?>
                    <label>Tipo</label>
                </div>
                <div class=" input-field col inline s3"> 
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
                
        <?= $this->Form->button(__('Registrar Proveedor'), array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
        <?= $this->Form->end() ?>
    </div>
   
</div>
