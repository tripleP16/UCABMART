<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaJuridica[]|\Cake\Collection\CollectionInterface $personaJuridica
 */
?>
<div class="personaJuridica index content">
    <?= $this->Html->link(__('New Persona Juridica'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Persona Juridica') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('per_jur_rif') ?></th>
                    <th><?= $this->Paginator->sort('per_jur_denominacion_comercial') ?></th>
                    <th><?= $this->Paginator->sort('per_jur_razon_social') ?></th>
                    <th><?= $this->Paginator->sort('per_jur_pagina_web') ?></th>
                    <th><?= $this->Paginator->sort('per_jur_capital_disponible') ?></th>
                    <th><?= $this->Paginator->sort('per_jur_direccion_fiscal') ?></th>
                    <th><?= $this->Paginator->sort('per_jur_direccion_fiscal_principal') ?></th>
                    <th><?= $this->Paginator->sort('FK_tie_codigo') ?></th>
                    <th><?= $this->Paginator->sort('lugar') ?></th>
                    <th><?= $this->Paginator->sort('lugar_fiscal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
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
                        <?= $this->Html->link(__('View'), ['action' => 'view', $personaJuridica->per_jur_rif]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $personaJuridica->per_jur_rif]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $personaJuridica->per_jur_rif], ['confirm' => __('Are you sure you want to delete # {0}?', $personaJuridica->per_jur_rif)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
