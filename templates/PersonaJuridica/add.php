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
        <div class=" input-field col inline s12"> 
            <?php
                echo $this->Form->control('per_jur_rif', array(
                    'placeholder'=>'J-00006372-9',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'text'
            ) );?>
            <label for="per_jur_rif">RIF</label>
        </div>
        <div class=" input-field col inline s12"> 
            <?php
                echo $this->Form->control('per_jur_denominacion_comercial', array(
                    'placeholder'=>'C.A. Pepsi-Cola Venezuela',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'text'
            ) );?>
            <label for="per_jur_denominacion_comercial">Denominacion Comercial</label>
        </div>
        <div class=" input-field col inline s12"> 
            <?php
                echo $this->Form->control('per_jur_razon_social',array(
                    'placeholder'=>'Belkys Luna y Asociados',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'text'
            ) );?>
            <label for="per_jur_razon_social">Razon Social</label>
        </div>
        <div class=" input-field col inline s12"> 
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
                'class'=>"browser-default",
                'id'=>'estadoFiscal',
                'empty'=> [-1 => 'Seleccione un estado' ],
                'options'=>$estados
            ));?>
            </div>

            <div class=" input-field col s12">
            <select name="municipio" id="municipioFiscal" class="browser-default" required>
                <option value="-1" >Seleccione un municipio</option>
            </select>
            </div>
            <div class=" input-field col s12">
                <select name="lugar" id="parroquiaFiscal" class="browser-default" required>
                    <option value="-1" disabled>Seleccione una parroquia</option>
                </select>
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
                'class'=>"browser-default",
                'id'=>'estadoPrincipal',
                'empty'=> [-1 => 'Seleccione un estado' ],
                'options'=>$estados
            ));?>
            </div>

            <div class=" input-field col s12">
            <select name="municipio" id="municipioPrincipal" class="browser-default" required>
                <option value="-1" >Seleccione un municipio</option>
            </select>
            </div>
            <div class=" input-field col s12">
                <select name="lugar_fiscal" id="parroquiaPrincipal" class="browser-default" required>
                    <option value="-1" disabled>Seleccione una parroquia</option>
                </select>
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
                <h5>Telefonos de Contacto</h5>
                <h6>Principal</h6>
                <div class=" input-field col s12">
                    <?= $this->Form->control('telefono.0.tel_tipo', array( 
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'select', 
                        
                        'options'=>['celular'=>'Celular', 'local'=>'Local']
                     ));?>
                    <label>Tipo</label>
                </div>
                <div class=" input-field col inline s12"> 
                    <?php
                        echo $this->Form->control('telefono.0.tel_numero', array(
                            'placeholder'=>'04241405428',
                            'label'=> false, 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'number'
                    ));?>
                    <label for="tel_numero">Numero de Telefono</label>
                </div>
                <h6>Secundario</h6>
                <div class=" input-field col s12">
                    <?= $this->Form->control('telefono.1.tel_tipo', array( 
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'select', 
                        
                        'options'=>['celular'=>'Celular', 'local'=>'Local']
                     ));?>
                    <label>Tipo</label>
                </div>
                <div class=" input-field col inline s12"> 
                    <?php
                        echo $this->Form->control('telefono.1.tel_numero', array(
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
            <div class=" input-field col inline s12"> 
                <?php
                echo $this->Form->control('cuenta_usuario.cue_usu_email', array(
                    'placeholder'=>'franco@gmail.com',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'email', 
                    'required'=>true
                ));?>
                <label for="cue_usu_email">Email</label>
            </div>
            <div class=" input-field col inline s12"> 
                <?php
                echo $this->Form->control('cuenta_usuario.cue_usu_contrasena', array(
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
                
                'options'=>$tiendas
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
<script>
    $(document).ready(function(){
        $('#estadoFiscal').change(function(){
            var id = $(this).val();
            if(id !=-1){
                $.ajax({
                type:'post', 
                url:"<?php echo $this->Url->build(['controller'=>'PersonaJuridica', 'action'=>'municipios']);?>",
                data:{id:id},
                headers:{
                    'X-CSRF-Token':$('[name = "_csrfToken"]').val()
                }
            }).done(function(response){
                var data = JSON.parse(response);
                desplegar(data, 'municipioFiscal');
                vacio('parroquiaFiscal');
            })
            }else{
                vacio('parroquiaFiscal');
                vacio('municipioFiscal');
               
            }
            
            
        })
        
        $('#municipioFiscal').change(function(){
            var id = $(this).val();
            if(id !=-1){
                $.ajax({
                type:'post', 
                url:"<?php echo $this->Url->build(['controller'=>'PersonaJuridica', 'action'=>'parroquias']);?>",
                data:{id:id},
                headers:{
                    'X-CSRF-Token':$('[name = "_csrfToken"]').val()
                }
            }).done(function(response){
                var data = JSON.parse(response);
                desplegar(data, 'parroquiaFiscal');
            })
            }else{
                vacio('parroquiaFiscal');
            }
            
            
        })

        /// 

        $('#estadoPrincipal').change(function(){
            var id = $(this).val();
            if(id !=-1){
                $.ajax({
                type:'post', 
                url:"<?php echo $this->Url->build(['controller'=>'PersonaJuridica', 'action'=>'municipios']);?>",
                data:{id:id},
                headers:{
                    'X-CSRF-Token':$('[name = "_csrfToken"]').val()
                }
            }).done(function(response){
                var data = JSON.parse(response);
                desplegar(data, 'municipioPrincipal');
                vacio('parroquiaPrincipal');
            })
            }else{
                vacio('parroquiaPrincipal');
                vacio('municipioPrincipal');
               
            }
            
            
        })
        
        $('#municipioPrincipal').change(function(){
            var id = $(this).val();
            if(id !=-1){
                $.ajax({
                type:'post', 
                url:"<?php echo $this->Url->build(['controller'=>'PersonaJuridica', 'action'=>'parroquias']);?>",
                data:{id:id},
                headers:{
                    'X-CSRF-Token':$('[name = "_csrfToken"]').val()
                }
            }).done(function(response){
                var data = JSON.parse(response);
                desplegar(data, 'parroquiaPrincipal');
            })
            }else{
                vacio('parroquiaPrincipal');
            }
            
            
        })
        function vacio(id){
            $('#'+id).empty();
            var tabla = [];
            tabla +=`<option value = "-1" disabled> Seleccione un ${id} </option>`
            $('#'+id).append(tabla);
          
        }
        function desplegar(data, id){
            $('#'+id).empty();
            var tabla = [];
            tabla +=`<option value = "-1" disabled> Seleccione un ${id} </option>`
            for(let i = 0 ; i<data.lugar.length; i++){
                tabla +=`<option value = "${data.lugar[i].lug_codigo}"> ${data.lugar[i].lug_nombre} </option>`
            }

            $('#'+id).append(tabla);
          
        }
    
  });

</script>

