<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaJuridica[]|\Cake\Collection\CollectionInterface $personaJuridica
 */
?>
<div class="personaJuridica index content">
    <?= $this->Html->link(__('Agregar Persona Juridica'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3 class="white-text"><?= __('Personas Juridicas') ?></h3>
    <div class="white">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Rif') ?></th>
                    <th><?= $this->Paginator->sort('Denominacion Comercial') ?></th>
                    <th><?= $this->Paginator->sort('Razon Social') ?></th>
                    <th><?= $this->Paginator->sort('Pagina Web') ?></th>
                    <th><?= $this->Paginator->sort('Capital Disponible') ?></th>
                    <th><?= $this->Paginator->sort('Direccion Fiscal') ?></th>
                    <th><?= $this->Paginator->sort('Direccion Fiscal Principal') ?></th>
                    <th><?= $this->Paginator->sort('Tienda Codigo') ?></th>
                    <th><?= $this->Paginator->sort('Codigo Parroquia') ?></th>
                    <th><?= $this->Paginator->sort('Codigo Parroquia Fiscal Principal') ?></th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personaJuridica as $personaJuridica): ?>
                <tr>
                    <td><?= h($personaJuridica->per_jur_rif) ?></td>
                    <td><?= h($personaJuridica->per_jur_denominacion_comercial) ?></td>
                    <td><?= h($personaJuridica->per_jur_razon_social) ?></td>
                    <td><?= h($personaJuridica->per_jur_pagina_web) ?></td>
                    <td><?= $this->Number->format($personaJuridica->per_jur_capital_disponible) ?></td>
                    <td><?= h($personaJuridica->per_jur_direccion_fiscal) ?></td>
                    <td><?= h($personaJuridica->per_jur_direccion_fiscal_principal) ?></td>
                    <td><?= $this->Number->format($personaJuridica->FK_tie_codigo) ?></td>
                    <td><?= $this->Number->format($personaJuridica->lugar) ?></td>
                    <td><?= $this->Number->format($personaJuridica->lugar_fiscal) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $personaJuridica->per_jur_rif]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $personaJuridica->per_jur_rif]) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $personaJuridica->per_jur_rif], ['confirm' => __('Are you sure you want to delete # {0}?', $personaJuridica->per_jur_rif)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator white">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultima') . ' >>') ?>
        </ul>
    </div>
</div>
