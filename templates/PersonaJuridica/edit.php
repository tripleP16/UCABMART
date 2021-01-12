<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaJuridica $personaJuridica
 */
?>
<div class="row">
    <?= $this->Form->create($personaJuridica, array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont"> 
        <h5 class="center">Editar Persona Juridica</h5>
                <?php
                    echo $this->Form->control('per_jur_denominacion_comercial', array('label'=>'Denominacion Comercial'));
                    echo $this->Form->control('per_jur_razon_social', array('label'=>'Razon Social'));
                    echo $this->Form->control('per_jur_pagina_web', array('label'=>'Pagina Web'));
                    echo $this->Form->control('per_jur_capital_disponible', array('label'=>'Capital Disponible'));
                    echo $this->Form->control('per_jur_direccion_fiscal', array('label'=>'Direccion Fiscal'));
                    echo $this->Form->control('per_jur_direccion_fiscal_principal', array('label'=>'Direccion Fiscal Principal'));
                ?>
                     <?= $this->Form->control('FK_tie_codigo', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>$tiendas
            ));?>
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
        </div>
           
            <?= $this->Form->button(__('Editar'), array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
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

