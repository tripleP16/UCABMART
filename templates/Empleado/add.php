<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empleado $empleado
 */
?>
<div class="row" >

                    <?= $this->Form->create($empleado, array('class' =>'col s8 offset-s2 formulario')) ?>
                        <div class="row formularioCont">
                            <h5 class="center">Registro de personal</h5>
                            <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('emp_cedula', array(
                            'placeholder'=>'27985319',
                            'label'=> 'Cedula', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
                        </div>
                        

                        <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('emp_primer_nombre', array(
                            'placeholder'=>'Diego',
                            'label'=> false, 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'
                    ));?>
                    <label for="emp_primer_nombre">Primer Nombre</label>
                          </div>

                          

                          <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('emp_segundo_nombre', array(
                            'placeholder'=>'Alejandro',
                            'label'=> false, 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'
                    ));?>
                    <label for="emp_segundo_nombre">Segundo Nombre</label>
                          </div>



                          <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('emp_primer_apellido', array(
                            'placeholder'=>'Cumares',
                            'label'=> false, 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'
                    ));?>
                    <label for="emp_primer_apellido">Primer Apellido</label>
                          </div>



                          <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('emp_segundo_apellido', array(
                            'placeholder'=>'Cumares',
                            'label'=> false, 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'
                    ));?>
                    <label for="emp_segundo_apellido">Segundo Apellido</label>
                          </div>



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



            <div class=" input-field col inline s12">
                <?php
                echo $this->Form->control('emp_direccion_hab', array(
                    'placeholder'=>'Av. El ejercico, Conjunto reciendencial Parque paraiso, Edificios morichal, Torre A , apartamento 184-A',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ));?>
                <label for="emp_direccion_hab">Direccion</label>
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
                    'type' =>'password', 
                    'required'=>true

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



</div>


<script>
    $(document).ready(function(){
        $('#estado').change(function(){
            var id = $(this).val();
            if(id !=-1){
                $.ajax({
                type:'post', 
                url:"<?php echo $this->Url->build(['controller'=>'Empleado', 'action'=>'municipios']);?>",
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
                url:"<?php echo $this->Url->build(['controller'=>'Empleado', 'action'=>'parroquias']);?>",
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