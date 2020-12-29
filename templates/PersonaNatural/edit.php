<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaNatural $personaNatural
 */
?>
<div class="row">
    <?= $this->Form->create($personaNatural, array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont">
    <h5 class="center">Editar Datos</h5>
        <?php
                    echo $this->Form->control('per_nat_rif', array('label'=>'RIF'));
                    echo $this->Form->control('per_nat_primer_nombre', array('label'=>'Primer Nombre'));
                    echo $this->Form->control('per_nat_segundo_nombre', array('label'=>'Segundo Nombre'));
                    echo $this->Form->control('per_nat_primer_apellido', array('label'=>'Primer Apellido'));
                    echo $this->Form->control('per_nat_segundo_apellido', array('label'=>'Segundo Apellido'));
                    echo $this->Form->control('per_nat_direccion', array('label'=>'Direccion'));
        ?>
        <div class=" input-field col s12">
        <?= $this->Form->control('FK_tie_codigo', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                
                'options'=>$tiendas
            ));?>
        </div>
            
        <div class=" input-field col s12">
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

            <div class=" input-field col s12">
            <select name="municipio" id="municipio" class="browser-default" required>
                <option value="-1" >Seleccione un municipio</option>
            </select>
            </div>
            <div class=" input-field col s12">
            <select name="FK_lug_codigo" id="parroquia" class="browser-default" required>
                <option value="-1" disabled>Seleccione una parroquia</option>
            </select>
            </div>
             
        <?= $this->Form->button(__('Editar'), array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
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
