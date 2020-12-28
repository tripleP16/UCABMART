<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaNatural $personaNatural
 * @var \App\Model\Entity\Telefono $telefono
 * @var \App\Model\Entity\Lugar $lugares 
 * 
 * 
 */
?>

<div class="row" >
        
        <?= $this->Form->create($personaNatural, array('class' =>'col s8 offset-s2 formulario')) ?>
        <div class="row formularioCont">
            <h5 class="center">Registro Persona Natural</h5>
            <div class=" input-field col inline s12"> 
                <?php
                    echo $this->Form->control('per_nat_cedula', array(
                            'placeholder'=>'27784169',
                            'label'=> 'Cedula', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'

                    ));?>
            </div>
            <div class=" input-field col inline s12"> 
                <?php
                    echo $this->Form->control('per_nat_rif', array(
                            'placeholder'=>'V-27784169-4',
                            'label'=> false, 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text'
                    ));?>
                <label for="per_nat_rif">RIF</label>
            </div>
            <div class=" input-field col inline s12"> 
                <?php
                echo $this->Form->control('per_nat_primer_nombre',array(
                    'placeholder'=>'Pablo',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ) );?>
                <label for="per_nat_primer_nombre">Primer Nombre</label>
            </div>
            <div class=" input-field col inline s12"> 
                <?php
                echo $this->Form->control('per_nat_segundo_nombre',array(
                    'placeholder'=>'Miguel',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ) );?>
                <label for="per_nat_segundo_nombre">Segundo Nombre</label>
            </div>
            <div class=" input-field col inline s12"> 
                <?php
                echo $this->Form->control('per_nat_primer_apellido', array(
                    'placeholder'=>'Perez',
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'text'
                ));?>
                <label for="per_nat_primer_apellido">Primer Apellido</label>
            </div>
            <div class=" input-field col inline s12"> 
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
            <div class="row">
                <?= $this->Html->link(__('¿Eres persona Juridica? Registrate Aqui'), ['controller'=>'PersonaJuridica', 'action' =>'add']);?>
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
