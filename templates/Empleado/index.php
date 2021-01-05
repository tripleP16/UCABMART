<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empleado[]|\Cake\Collection\CollectionInterface $empleado
 */
?>
<div class="empleado index content">
<?= $this->Html->link(__('Contratar Empleado'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3 class="white-text"><?= __('Empleado') ?></h3>
    <div class="white">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Cedula') ?></th>
                    <th><?= $this->Paginator->sort('Primer Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Segundo Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Primer Apellido') ?></th>
                    <th><?= $this->Paginator->sort('Segundo Apellido') ?></th>
                    <th><?= $this->Paginator->sort('Direccion') ?></th>
                    <th><?= $this->Paginator->sort('Parroquia') ?></th>
                    <th><?= $this->Paginator->sort('Tienda') ?></th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empleado as $empleado): ?>
                <tr>
                    <td><?= h($empleado->emp_cedula) ?></td>
                    <td><?= h($empleado->emp_primer_nombre) ?></td>
                    <td><?= h($empleado->emp_segundo_nombre) ?></td>
                    <td><?= h($empleado->emp_primer_apellido) ?></td>
                    <td><?= h($empleado->emp_segundo_apellido) ?></td>
                    <td><?= h($empleado->emp_direccion_hab) ?></td>
                    <td><?= $this->Number->format($empleado->FK_lug_codigo) ?></td>
                    <td><?= $this->Number->format($empleado->FK_tie_codigo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'View', $empleado->emp_cedula]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'Edit', $empleado->emp_cedula]) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'Delete', $empleado->emp_cedula], ['confirm' => __('Are you sure you want to delete # {0}?', $empleado->emp_cedula)]) ?>
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










