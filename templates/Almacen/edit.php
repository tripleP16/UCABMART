<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Almacen $almacen
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $almacen->alm_codigo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $almacen->alm_codigo), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Almacen'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="almacen form content">
            <?= $this->Form->create($almacen) ?>
            <fieldset>
                <legend><?= __('Edit Almacen') ?></legend>
                <?php
                    echo $this->Form->control('alm_dirección');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
