<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaJuridica $personaJuridica
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $personaJuridica->per_jur_rif],
                ['confirm' => __('Are you sure you want to delete # {0}?', $personaJuridica->per_jur_rif), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Persona Juridica'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="personaJuridica form content">
            <?= $this->Form->create($personaJuridica) ?>
            <fieldset>
                <legend><?= __('Edit Persona Juridica') ?></legend>
                <?php
                    echo $this->Form->control('per_jur_denominacion_comercial');
                    echo $this->Form->control('per_jur_razon_social');
                    echo $this->Form->control('per_jur_pagina_web');
                    echo $this->Form->control('per_jur_capital_disponible');
                    echo $this->Form->control('per_jur_direccion_fiscal');
                    echo $this->Form->control('per_jur_direccion_fiscal_principal');
                    echo $this->Form->control('FK_tie_codigo');
                    echo $this->Form->control('lugar');
                    echo $this->Form->control('lugar_fiscal');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
