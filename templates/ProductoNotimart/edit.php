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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productoNotimart->prod_not_codigo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productoNotimart->prod_not_codigo), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Producto Notimart'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productoNotimart form content">
            <?= $this->Form->create($productoNotimart) ?>
            <fieldset>
                <legend><?= __('Edit Producto Notimart') ?></legend>
                <?php
                    echo $this->Form->control('prod_not_descuento');
                    echo $this->Form->control('prod_not_fecha_inicio');
                    echo $this->Form->control('prod_not_fecha_FIN');
                    echo $this->Form->control('FK_prod_codigo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
