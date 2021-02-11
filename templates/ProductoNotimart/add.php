<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductoNotimart $productoNotimart
 */
?>
<div class="row">
<?= $this->Form->create($productoNotimart, array('class' =>'col s8 offset-s2 formulario')) ?>
    <div class="row formularioCont">   
        <h5 class="center">Agregar Producto</h5>
            <fieldset>
                <?php
                    echo $this->Form->control('prod_not_descuento',array('label'=>'Descuento'));
                    echo $this->Form->control('prod_not_fecha_inicio',array('label'=>'Fecha de inicio'));
                    echo $this->Form->control('prod_not_fecha_FIN',array('label'=>'Fecha final'));
                ?>
            </fieldset>
            <?= $this->Form->button(__('Añadir Notimart'), array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>



