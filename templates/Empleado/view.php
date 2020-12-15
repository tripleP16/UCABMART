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
            <?= $this->Html->link(__('Edit Empleado'), ['action' => 'edit', $empleado->emp_cedula], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Empleado'), ['action' => 'delete', $empleado->emp_cedula], ['confirm' => __('Are you sure you want to delete # {0}?', $empleado->emp_cedula), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Empleado'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Empleado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="empleado view content">
            <h3><?= h($empleado->emp_cedula) ?></h3>
            <table>
                <tr>
                    <th><?= __('Emp Cedula') ?></th>
                    <td><?= h($empleado->emp_cedula) ?></td>
                </tr>
                <tr>
                    <th><?= __('Emp Primer Nombre') ?></th>
                    <td><?= h($empleado->emp_primer_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Emp Segundo Nombre') ?></th>
                    <td><?= h($empleado->emp_segundo_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Emp Primer Apellido') ?></th>
                    <td><?= h($empleado->emp_primer_apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Emp Segundo Apellido') ?></th>
                    <td><?= h($empleado->emp_segundo_apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Emp Direccion Hab') ?></th>
                    <td><?= h($empleado->emp_direccion_hab) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Lug Codigo') ?></th>
                    <td><?= $this->Number->format($empleado->FK_lug_codigo) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Beneficio') ?></h4>
                <?php if (!empty($empleado->beneficio)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Ben Codigo') ?></th>
                            <th><?= __('Ben Nombre') ?></th>
                            <th><?= __('Ben Descipcion') ?></th>
                            <th><?= __('Ben Valor') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($empleado->beneficio as $beneficio) : ?>
                        <tr>
                            <td><?= h($beneficio->ben_codigo) ?></td>
                            <td><?= h($beneficio->ben_nombre) ?></td>
                            <td><?= h($beneficio->ben_descipcion) ?></td>
                            <td><?= h($beneficio->ben_valor) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Beneficio', 'action' => 'view', $beneficio->ben_codigo]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Beneficio', 'action' => 'edit', $beneficio->ben_codigo]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Beneficio', 'action' => 'delete', $beneficio->ben_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $beneficio->ben_codigo)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
