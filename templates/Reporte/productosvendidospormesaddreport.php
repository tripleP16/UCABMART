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
            <div class=" input-field col inline s12"> 
                <span>Años</span>
                <?php
                    echo $this->Form->control('year', array( 
                            
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'select',
                            'id'=>'year', 
                            'options'=>$year, 
                            'label'=>false
                            

                ));?>
                
            </div>
            <div class=" input-field col inline s12"> 
                <span>Meses</span>
            
            <?php
                    echo $this->Form->control('month', array( 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'select',
                            'id'=>'month', 
                            'options'=>$mes, 
                            'label'=>false
                ));?>
            
            </div>
            <?= $this->Form->button(__('Generar Reporte') , array('class'=> 'waves-effect waves-light btn-large black-text')) ?>
            <?= $this->Form->end() ?>
        </div>
</div>
