<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empleado[]|\Cake\Collection\CollectionInterface $empleado
 */
?>
<div class="empleado index content">
<?= $this->Html->link(__('Contratar Empleado'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3><?= __('Empleado') ?></h3>
    <div class="white">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('emp_cedula') ?></th>
                    <th><?= $this->Paginator->sort('emp_primer_nombre') ?></th>
                    <th><?= $this->Paginator->sort('emp_segundo_nombre') ?></th>
                    <th><?= $this->Paginator->sort('emp_primer_apellido') ?></th>
                    <th><?= $this->Paginator->sort('emp_segundo_apellido') ?></th>
                    <th><?= $this->Paginator->sort('emp_direccion_hab') ?></th>
                    <th><?= $this->Paginator->sort('FK_lug_codigo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
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










