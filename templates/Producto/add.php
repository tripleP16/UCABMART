<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<div class="row">
    <?= $this->Form->create($producto, array('class' =>'col s8 offset-s2 formulario', 'type' => 'file')) ?>
    <div class="row formularioCont">
        <h5 class="center">Añadir un producto</h5>
        <div class=" input-field col inline s6">
                <?php
                    echo $this->Form->control('prod_nombre', array(
                        'placeholder'=>'Camisa Nike',
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'text',
                        
                ));?>
                <label for="prod_nombre">Nombre</label>
        </div>
        <div class="col input-field  inline s6">
                <?php
                    echo $this->Form->control('prod_precio_bolivar', array(
                        'placeholder'=>'65.5',
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'number',
                        
                        
                ));?>
                <label for="prod_precio_bolivar">Precio en Bolivares</label>
        </div>
        <div class=" input-field col inline s12">
                <?php
                    echo $this->Form->control('prod_descripcion', array(
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'textarea', 
                        'class'=>'materialize-textarea'
                ));?>
                <label for="prod_descripcion">Descripcion</label>
        </div>
        <div class=" file-field input-field col inline s6">
            <div class="btn">
            <span>Imagen</span>
                <?php
                    echo $this->Form->control('prod_imagen', array(
                        'label'=> false, 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'file', 
                        'accept'=>"image/png, image/jpeg"
                ));?>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <img class="materialboxed col s6" src="/UCABMART/img/fondo-login.jpg">
        <div class="col input-field  inline s6">
        <?= $this->Form->control('Submarca', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione una Submarca',
                'options'=>['Hay', 'Que', 'Poner', 'Submarcas']
            ));?>
        </div>
        <div class="col input-field  inline s6">
        <?= $this->Form->control('Proveedor', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select', 
                'empty'=>'Seleccione un Proveedor',
                'options'=>['Hay', 'Que', 'Poner', 'Proveedores']
            ));?>
        </div>
    </div>
    <div class=" input-field col s12">
            <?= $this->Form->button(__('Añadir Producto') , array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
    </div>
            <?= $this->Form->end() ?>
</div>
