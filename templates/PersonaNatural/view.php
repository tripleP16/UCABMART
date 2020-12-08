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
            <?= $this->Html->link(__('Edit Persona Natural'), ['action' => 'edit', $personaNatural->per_nat_cedula], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Persona Natural'), ['action' => 'delete', $personaNatural->per_nat_cedula], ['confirm' => __('Are you sure you want to delete # {0}?', $personaNatural->per_nat_cedula), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Persona Natural'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Persona Natural'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="personaNatural view content">
            <h3><?= h($personaNatural->per_nat_cedula) ?></h3>
            <table>
                <tr>
                    <th><?= __('Per Nat Cedula') ?></th>
                    <td><?= h($personaNatural->per_nat_cedula) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Nat Rif') ?></th>
                    <td><?= h($personaNatural->per_nat_rif) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Nat Primer Nombre') ?></th>
                    <td><?= h($personaNatural->per_nat_primer_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Nat Segundo Nombre') ?></th>
                    <td><?= h($personaNatural->per_nat_segundo_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Nat Primer Apellido') ?></th>
                    <td><?= h($personaNatural->per_nat_primer_apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Nat Segundo Apellido') ?></th>
                    <td><?= h($personaNatural->per_nat_segundo_apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Per Nat Direccion') ?></th>
                    <td><?= h($personaNatural->per_nat_direccion) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Tie Codigo') ?></th>
                    <td><?= $this->Number->format($personaNatural->FK_tie_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Lug Codigo') ?></th>
                    <td><?= $this->Number->format($personaNatural->FK_lug_codigo) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
