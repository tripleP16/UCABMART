<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdenDeCompra $ordenDeCompra
 */
?>

<div class="row">
    <?= $this->Form->create($ordenDeCompra, array('class' =>'col s8 offset-s2 formulario')) ?>
    <h5 class="center">Editar Estado</h5>
    <div class="row formularioCont">

    <?php
            foreach ($query as $query):
        ?>
        <div class="col input-field  inline s12">
        <?= $this->Form->control('Estado', array( 
                'label'=> false, 
                'templates'     => ['inputContainer' => '{{content}}'],
                'type'=>'select',    
                'options'=>$estados
        ));?>
        </div>
        <div class="col input-field  inline s12">
         <?php
                    echo $this->Form->control('ord_com_numero', array(
                        'label'=> 'Numero de Factura', 
                        'templates'     => ['inputContainer' => '{{content}}'],
                        'type'=>'text',
                        'disabled'=> true, 
                        'value'=>$query['ord_com_numero']
                        
                ));?>
        </div>
                <?php
                    endforeach;
                ?>
         <?= $this->Form->button(__('Subir Cambio') , array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
        <?= $this->Form->end() ?>


    </div>
    </div>
