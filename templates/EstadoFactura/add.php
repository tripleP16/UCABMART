<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EstadoFactura $estadoFactura
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Estado Factura'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="estadoFactura form content">
            <?= $this->Form->create($estadoFactura) ?>
            <fieldset>
                <legend><?= __('Add Estado Factura') ?></legend>
                <?php
                    echo $this->Form->control('fac_fecha_hora');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
