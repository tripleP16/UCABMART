<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Zona $zona
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $zona->zon_codigo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $zona->zon_codigo), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Zona'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="zona form content">
            <?= $this->Form->create($zona) ?>
            <fieldset>
                <legend><?= __('Edit Zona') ?></legend>
                <?php
                    echo $this->Form->control('zon_nombre');
                    echo $this->Form->control('zon_refrigeracion');
                    echo $this->Form->control('zon_capacidad');
                    echo $this->Form->control('FK_alm_codigo');
                    echo $this->Form->control('FK_rub_codigo');
                    echo $this->Form->control('pasillo._ids', ['options' => $pasillo]);
                    echo $this->Form->control('producto._ids', ['options' => $producto]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
