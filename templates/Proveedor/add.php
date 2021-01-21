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
                    'required'=>true,
                    'options'=>$rubros
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
                'empty'=> [-1 => 'Seleccione un estado' ],
                'id'=>'estadoPrincipal',
                'class'=>'browser-default',
                'options'=>$estados
            ));?>
                
            </div>

            <div class=" input-field col s12">
            <select name="municipio" id="municipioPrincipal" class="browser-default" required>
                <option value="-1" >Seleccione un municipio</option>
            </select>
            </div>
            <div class=" input-field col s12">
                <select name="lugar" id="parroquiaPrincipal" class="browser-default" required>
                    <option value="-1" disabled>Seleccione una parroquia</option>
                </select>
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
                'id'=>'estadoFiscal',
                'empty'=> [-1 => 'Seleccione un estado' ],
                'class'=>'browser-default',
                'options'=>$estados
            ));?>
               
            </div>

            <div class=" input-field col s12">
            <select name="municipio" id="municipioFiscal" class="browser-default" required>
                <option value="-1" >Seleccione un municipio</option>
            </select>
            </div>
            <div class=" input-field col s12">
                <select name="lugar_fiscal" id="parroquiaFiscal" class="browser-default" required>
                    <option value="-1" disabled>Seleccione una parroquia</option>
                </select>
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
        
        
                
        <?= $this->Form->button(__('Registrar Proveedor'), array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
        <?= $this->Form->end() ?>
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
            tabla +=`<option value = "-1" > Seleccione un ${id} </option>`
            $('#'+id).append(tabla);
          
        }
        function desplegar(data, id){
            $('#'+id).empty();
            var tabla = [];
            tabla +=`<option value = "-1" > Seleccione un ${id} </option>`
            for(let i = 0 ; i<data.lugar.length; i++){
                tabla +=`<option value = "${data.lugar[i].lug_codigo}"> ${data.lugar[i].lug_nombre} </option>`
            }

            $('#'+id).append(tabla);
          
        }
    
  });

</script>