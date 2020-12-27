<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tienda $tienda
 */
?>
<div class="row">
    <?= $this->Form->create($tienda,  array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont">
    <h5 class="center">Registro de Tienda</h5>
        <div class=" input-field col inline s12">
            <?= $this->Form->control('Estado', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select',

                'empty'=> [-1 => 'Seleccione un estado' ],
                'class'=>"browser-default",
                'required'=>true,
                
                'options'=>$estados
            ));?>
        </div>
        <div class=" input-field col inline s12">
            <select name="municipio" id="municipio" class="browser-default" required>
                <option value="-1" >Seleccione un municipio</option>
            </select>
        </div>
        <div class=" input-field col inline s12">
            <select name="FK_lug_codigo" id="parroquia" class="browser-default" required>
                <option value="-1" disabled>Seleccione una parroquia</option>
            </select>
        </div>
        <div class=" input-field col inline s12">
            <?php
                echo $this->Form->control('tie_direccion',  array(
                    'placeholder'=>'Av. Francisco Lazo Marti Edificio Delta Torre A apartamento 4B',
                    'label'=> 'Direccion de la tienda', 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'text'
            ));?>
        </div>
        <div class=" input-field col inline s12">
            <?php
        
            echo $this->Form->control('tie_rif', array(
                            'placeholder'=>'V-27784169-4',
                            'label'=> 'RIF de la tienda', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'
                    ));?>
        </div>
       
                
    
           
        <?= $this->Form->button(__('Registrar Tienda'), array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
        <?= $this->Form->end() ?>
    
    
    </div>
              
     
</div>
<script>
    $(document).ready(function(){
        $('#estado').change(function(){
            var id = $(this).val();
            if(id !=-1){
                $.ajax({
                type:'post', 
                url:"<?php echo $this->Url->build(['controller'=>'PersonaNatural', 'action'=>'municipios']);?>",
                data:{id:id},
                headers:{
                    'X-CSRF-Token':$('[name = "_csrfToken"]').val()
                }
            }).done(function(response){
                var data = JSON.parse(response);
                desplegar(data, 'municipio');
                vacio('parroquia');
            })
            }else{
                vacio('parroquia');
                vacio('municipio');
               
            }
            
            
        })
        
        $('#municipio').change(function(){
            var id = $(this).val();
            if(id !=-1){
                $.ajax({
                type:'post', 
                url:"<?php echo $this->Url->build(['controller'=>'PersonaNatural', 'action'=>'parroquias']);?>",
                data:{id:id},
                headers:{
                    'X-CSRF-Token':$('[name = "_csrfToken"]').val()
                }
            }).done(function(response){
                var data = JSON.parse(response);
                desplegar(data, 'parroquia');
            })
            }else{
                vacio('parroquia');
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
