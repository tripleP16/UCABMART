<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proveedor $proveedor
 */
?>
<div class="row">
    <?= $this->Form->create($proveedor,  array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont">
    <h4 class="center">Editar Proveedor</h4>
            <?php
                    echo $this->Form->control('pro_razon_social', array('label'=>'Razon Social'));
                    echo $this->Form->control('pro_denominacion_comercial', array('label'=>'Denominacion Comercial'));
                    echo $this->Form->control('pro_pagina_web', array('label'=>'Pagina Web'));
                   
                    
                    echo $this->Form->control('rubro._ids', ['options' => $rubros]);
                ?>

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
                <?php
                echo $this->Form->control('pro_direccion_fisica', array('label'=>'Direccion Fisica'));?>
            </div>

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
            <?php
            echo $this->Form->control('pro_direccion_fiscal', array('label'=>'Direccion Fiscal'));?>
            </div>
            <?= $this->Form->button(__('Editar Proveedor'), array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
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