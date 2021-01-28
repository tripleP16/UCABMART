<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rol $rol
 */
?>
<div class="row" >
    <?= $this->Form->create(null, array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont">
        <h5 class="center">Creacion de Roles</h5>
        <div class=" input-field col s12">
                <?= $this->Form->control('privilegios', array( 
                    'label'=> 'Privilegios ', 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'select',
                    'multiple'=>true,
                    'required'=>true,
                    'options'=> $privilegios
                ));?>
        </div>
        <div class=" input-field col inline s12"> 
                        <?php
                            echo $this->Form->control('rol_nombre', array(
                            'label'=> 'Nombre del rol', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text',
                            'required'=>true
                    ));?>
            </div>
        <div class=" input-field col s12">
            <?= $this->Form->button(__('Crear Rol') , array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>