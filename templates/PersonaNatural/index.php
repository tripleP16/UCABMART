<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaNatural[]|\Cake\Collection\CollectionInterface $personaNatural
 */
?>
<div class="personaNatural index content">
    <?= $this->Html->link(__('New Persona Natural'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Persona Natural') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('per_nat_cedula') ?></th>
                    <th><?= $this->Paginator->sort('per_nat_rif') ?></th>
                    <th><?= $this->Paginator->sort('per_nat_primer_nombre') ?></th>
                    <th><?= $this->Paginator->sort('per_nat_segundo_nombre') ?></th>
                    <th><?= $this->Paginator->sort('per_nat_primer_apellido') ?></th>
                    <th><?= $this->Paginator->sort('per_nat_segundo_apellido') ?></th>
                    <th><?= $this->Paginator->sort('per_nat_direccion') ?></th>
                    <th><?= $this->Paginator->sort('FK_tie_codigo') ?></th>
                    <th><?= $this->Paginator->sort('FK_lug_codigo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personaNatural as $personaNatural): ?>
                <tr>
                    <td><?= h($personaNatural->per_nat_cedula) ?></td>
                    <td><?= h($personaNatural->per_nat_rif) ?></td>
                    <td><?= h($personaNatural->per_nat_primer_nombre) ?></td>
                    <td><?= h($personaNatural->per_nat_segundo_nombre) ?></td>
                    <td><?= h($personaNatural->per_nat_primer_apellido) ?></td>
                    <td><?= h($personaNatural->per_nat_segundo_apellido) ?></td>
                    <td><?= h($personaNatural->per_nat_direccion) ?></td>
                    <td><?= $this->Number->format($personaNatural->FK_tie_codigo) ?></td>
                    <td><?= $this->Number->format($personaNatural->FK_lug_codigo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $personaNatural->per_nat_cedula]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $personaNatural->per_nat_cedula]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $personaNatural->per_nat_cedula], ['confirm' => __('Are you sure you want to delete # {0}?', $personaNatural->per_nat_cedula)]) ?>
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
