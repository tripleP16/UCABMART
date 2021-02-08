<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Form\DateForm $DateForm 
 * 
 */

use App\Form\DateForm; 

?>
<div class="row">
<?= $this->Form->create($DateForm = new DateForm() , array('class' =>'col s8 offset-s2 formulario')) ?>
        <div class="row formularioCont">
            <h3>Ordenes de Compra por tienda</h3>
            <div class=" input-field col inline s12"> 
                <?php
                    echo $this->Form->control('dia_inicio', array( 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text',
                            'id'=>'inicio', 
                ));?>
                
            </div>
            <div class=" input-field col inline s12">  
                <?php
                    echo $this->Form->control('dia_fin', array( 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text',
                            'id'=>'fin', 
                ));?>
                
            </div>
            <div class=" input-field col s12">
                <span>Tiendas</span>
                <?= $this->Form->control('FK_tie_codigo', array( 
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type'=>'select',
                    'required'=>true,
                    'options'=>$tiendas
                ));?>
            </div>
            <?= $this->Form->button(__('Generar Reporte') , array('class'=> 'waves-effect waves-light btn-large black-text')) ?>
            <?= $this->Form->end() ?>
        </div>
</div>
<script>
$(document).ready(function(){
    $('#inicio').datepicker({ format: 'yyyy-mm-dd' });
    $('#fin').datepicker({ format: 'yyyy-mm-dd' });
})
</script>