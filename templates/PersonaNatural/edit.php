<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaNatural $personaNatural
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $personaNatural->per_nat_cedula],
                ['confirm' => __('Are you sure you want to delete # {0}?', $personaNatural->per_nat_cedula), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Persona Natural'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="personaNatural form content">
            <?= $this->Form->create($personaNatural) ?>
            <fieldset>
                <legend><?= __('Edit Persona Natural') ?></legend>
                <?php
                    echo $this->Form->control('per_nat_rif');
                    echo $this->Form->control('per_nat_primer_nombre');
                    echo $this->Form->control('per_nat_segundo_nombre');
                    echo $this->Form->control('per_nat_primer_apellido');
                    echo $this->Form->control('per_nat_segundo_apellido');
                    echo $this->Form->control('per_nat_direccion');
                    echo $this->Form->control('FK_tie_codigo');
                    echo $this->Form->control('FK_lug_codigo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
