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
            <h3>Reporte de Empleados</h3>
            <div class=" input-field col inline s9"> 
                <?php
                    echo $this->Form->control('year', array( 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text',
                            'id'=>'year', 
                ));?>
                
            </div>
            <?= $this->Form->button(__('Generar Reporte') , array('class'=> 'waves-effect waves-light btn-large black-text')) ?>
            <?= $this->Form->end() ?>
        </div>
</div>
<script>
$(document).ready(function(){
    $('#year').yearpicker({ format: 'yyyy' });
})
</script>