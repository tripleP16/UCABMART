<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rol $rol
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rol->rol_codigo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rol->rol_codigo), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Rol'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rol form content">
            <?= $this->Form->create($rol) ?>
            <fieldset>
                <legend><?= __('Edit Rol') ?></legend>
                <?php
                    echo $this->Form->control('rol_nombre');
                    echo $this->Form->control('cuenta_usuario._ids', ['options' => $cuentaUsuario]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
