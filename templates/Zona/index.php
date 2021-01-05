<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Zona[]|\Cake\Collection\CollectionInterface $zona
 */
?>
<div class="zona index content">
    <?= $this->Html->link(__('New Zona'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Zona') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('zon_codigo') ?></th>
                    <th><?= $this->Paginator->sort('zon_nombre') ?></th>
                    <th><?= $this->Paginator->sort('zon_refrigeracion') ?></th>
                    <th><?= $this->Paginator->sort('zon_capacidad') ?></th>
                    <th><?= $this->Paginator->sort('FK_alm_codigo') ?></th>
                    <th><?= $this->Paginator->sort('FK_rub_codigo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($zona as $zona): ?>
                <tr>
                    <td><?= $this->Number->format($zona->zon_codigo) ?></td>
                    <td><?= h($zona->zon_nombre) ?></td>
                    <td><?= h($zona->zon_refrigeracion) ?></td>
                    <td><?= $this->Number->format($zona->zon_capacidad) ?></td>
                    <td><?= $this->Number->format($zona->FK_alm_codigo) ?></td>
                    <td><?= $this->Number->format($zona->FK_rub_codigo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $zona->zon_codigo]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $zona->zon_codigo]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $zona->zon_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $zona->zon_codigo)]) ?>
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
