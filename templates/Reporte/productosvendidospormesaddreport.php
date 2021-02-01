<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Form\YearmonthForm $YearmonthForm
 * 
 */

use App\Form\YearmonthForm; 

?>
<div class="row">
<?= $this->Form->create($DateForm = new YearmonthForm() , array('class' =>'col s8 offset-s2 formulario')) ?>
        <div class="row formularioCont">
            <h3>Reporte de Productos mas vendidos</h3>
            <div class=" input-field col inline s6"> 
                <?php
                    echo $this->Form->control('year', array( 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text',
                            'id'=>'year', 
                ));?>
                
            </div>
            <div class=" input-field col inline s6"> 
            <?php
                    echo $this->Form->control('month', array( 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'text',
                            'id'=>'month', 
                ));?>
            <!--<select id="month"> 
                <option value="" disabled selected>Month</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>-->
            </div>
            <?= $this->Form->button(__('Generar Reporte') , array('class'=> 'waves-effect waves-light btn-large black-text')) ?>
            <?= $this->Form->end() ?>
        </div>
</div>
<script>
$(document).ready(function(){
    $('#year').yearpicker({ format: 'yyyy' });
    $('#month').yearpicker({ format: 'yyyy' });
</script>