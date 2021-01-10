<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Form\ExcelForm $ExcelForm 
 * 
 */

use App\Form\ExcelForm;

?>
<div class="row">
    <?= $this->Form->create($ExcelForm = new ExcelForm() , array('class' =>'col s8 offset-s2 formulario', 'type'=>'file')) ?>
    <div class="row formularioCont">
        <h3>Alcance del Reporte</h3>
        <div class=" input-field col inline s6"> 
            <?php
                echo $this->Form->control('dia_inicio', array( 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'text',
                        'id'=>'inicio', 
            ));?>
                
        </div>
        <div class=" input-field col inline s6"> 
            <?php
                echo $this->Form->control('dia_fin', array( 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'text',
                        'id'=>'fin', 
            ));?>
                
        </div>
        <div class="file-field input-field col inline s12">
            <div class="btn">
                <span>Archivo</span>
                <?php
                    echo $this->Form->control('archivo_excel', array( 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'file',
                        'label'=>false, 
                        'accept'=>".xls,.xlsx"
                ));?>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <?= $this->Form->button(__('Generar Reporte') , array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#inicio').datepicker({ format: 'yyyy-mm-dd' });
    $('#fin').datepicker({ format: 'yyyy-mm-dd' });
})
</script>