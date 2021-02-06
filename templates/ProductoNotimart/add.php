<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductoNotimart $productoNotimart
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Producto Notimart'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productoNotimart form content">
            <?= $this->Form->create($productoNotimart) ?>
            <fieldset>
                <legend><?= __('Add Producto Notimart') ?></legend>
                <?php
                    echo $this->Form->control('prod_not_descuento');
                    echo $this->Form->control('prod_not_fecha_inicio');
                    echo $this->Form->control('prod_not_fecha_FIN');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>

$(document).ready( function () {
    $('#tiendas').DataTable({
        
    });
    $('select').formSelect();
    $('input').css('border-top','0px')
    $('input').css('border-left','0px')
    $('input').css('border-right','0px')
} );
</script>


