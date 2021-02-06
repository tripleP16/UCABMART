<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Form\YearForm $YearForm 
 * 
 */

use App\Form\YearForm; 

?>
<div class="row">
<?= $this->Form->create($DateForm = new YearForm() , array('class' =>'col s8 offset-s2 formulario')) ?>
        <div class="row formularioCont">
            <h3>Reporte de los meses mas productivos del año</h3>
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