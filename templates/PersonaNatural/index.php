<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaNatural[]|\Cake\Collection\CollectionInterface $personaNatural
 */
?>
<div class="personaNatural index content">
    <?= $this->Html->link(__('Agregar Persona Natural'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3 class="white-text"><?= __('Persona Natural') ?></h3>
    <div class="white">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Cedula') ?></th>
                    <th><?= $this->Paginator->sort('RIF') ?></th>
                    <th><?= $this->Paginator->sort('Primer Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Segundo Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Primer Apellido') ?></th>
                    <th><?= $this->Paginator->sort('Segundo Apellido') ?></th>
                    <th><?= $this->Paginator->sort('Direccion') ?></th>
                    <th><?= $this->Paginator->sort('Tienda numero') ?></th>
                    <th><?= $this->Paginator->sort('Numero de Parroquia') ?></th>
                    <th class="actions"><?= __('Opciones') ?></th>
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
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $personaNatural->per_nat_cedula]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $personaNatural->per_nat_cedula]) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $personaNatural->per_nat_cedula], ['confirm' => __('Are you sure you want to delete # {0}?', $personaNatural->per_nat_cedula)]) ?>
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
