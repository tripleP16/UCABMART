<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empleado $empleado
 */
?>

<div class="row">
    <?= $this->Form->create($empleado, array('class' =>'col s8 offset-s2 formulario')) ?>
    <h5 class="center">Editar Tienda</h5>
    <div class="row formularioCont">
                <?php
                    echo $this->Form->control('emp_primer_nombre', array("label"=>"Primer Nombre"));
                    echo $this->Form->control('emp_segundo_nombre', array("label"=>"Segundo Nombre"));
                    echo $this->Form->control('emp_primer_apellido', array("label"=>"Primer Apellido"));
                    echo $this->Form->control('emp_segundo_apellido', array("label"=>"Segundo Apellido"));
                    echo $this->Form->control('emp_direccion_hab', array("label"=>"Direccion"));
                    echo $this->Form->control('beneficio._ids', ['options' => $beneficio]);
                ?>



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
            <div class=" input-field col s12">
                <?= $this->Form->control('FK_tie_codigo', array( 
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'select',
                    'required'=>true,
                    'options'=>$tiendas
                ));?>
            </div>
             
        <?= $this->Form->button(__('Editar'), array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
        <?= $this->Form->end() ?>
    </div>    
        </div>
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


