<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empleado $empleado
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Empleado'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="empleado form content">
            <?= $this->Form->create($empleado) ?>
            <fieldset>
                <legend><?= __('Add Empleado') ?></legend>
                <?php
                    echo $this->Form->control('emp_primer_nombre');
                    echo $this->Form->control('emp_segundo_nombre');
                    echo $this->Form->control('emp_primer_apellido');
                    echo $this->Form->control('emp_segundo_apellido');
                    echo $this->Form->control('emp_direccion_hab');
                    echo $this->Form->control('FK_lug_codigo');
                    echo $this->Form->control('beneficio._ids', ['options' => $beneficio]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
