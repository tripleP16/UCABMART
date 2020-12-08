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
            <?= $this->Html->link(__('Edit Persona Juridica'), ['action' => 'edit', $personaJuridica->per_jur_rif], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Persona Juridica'), ['action' => 'delete', $personaJuridica->per_jur_rif], ['confirm' => __('Are you sure you want to delete # {0}?', $personaJuridica->per_jur_rif), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Persona Juridica'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Persona Juridica'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="personaJuridica view content">
            <h3><?= h($personaJuridica->per_jur_rif) ?></h3>
            <table>
                <tr>
                    <th><?= __('Per Jur Rif') ?></th>
                    <td><?= h($personaJuridica->per_jur_rif) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Jur Denominacion Comercial') ?></th>
                    <td><?= h($personaJuridica->per_jur_denominacion_comercial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Jur Razon Social') ?></th>
                    <td><?= h($personaJuridica->per_jur_razon_social) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Jur Pagina Web') ?></th>
                    <td><?= h($personaJuridica->per_jur_pagina_web) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Jur Direccion Fiscal') ?></th>
                    <td><?= h($personaJuridica->per_jur_direccion_fiscal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Jur Direccion Fiscal Principal') ?></th>
                    <td><?= h($personaJuridica->per_jur_direccion_fiscal_principal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Jur Capital Disponible') ?></th>
                    <td><?= $this->Number->format($personaJuridica->per_jur_capital_disponible) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Tie Codigo') ?></th>
                    <td><?= $this->Number->format($personaJuridica->FK_tie_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lugar') ?></th>
                    <td><?= $this->Number->format($personaJuridica->lugar) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lugar Fiscal') ?></th>
                    <td><?= $this->Number->format($personaJuridica->lugar_fiscal) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
