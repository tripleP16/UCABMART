<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tienda[]|\Cake\Collection\CollectionInterface $tienda
 */
?>
<div class="tienda index content">
    <?= $this->Html->link(__('New Tienda'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tienda') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('tie_codigo') ?></th>
                    <th><?= $this->Paginator->sort('tie_direccion') ?></th>
                    <th><?= $this->Paginator->sort('tie_rif') ?></th>
                    <th><?= $this->Paginator->sort('FK_alm_codigo') ?></th>
                    <th><?= $this->Paginator->sort('FK_lug_codigo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tienda as $tienda): ?>
                <tr>
                    <td><?= $this->Number->format($tienda->tie_codigo) ?></td>
                    <td><?= h($tienda->tie_direccion) ?></td>
                    <td><?= $this->Number->format($tienda->tie_rif) ?></td>
                    <td><?= $this->Number->format($tienda->FK_alm_codigo) ?></td>
                    <td><?= $this->Number->format($tienda->FK_lug_codigo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tienda->tie_codigo]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tienda->tie_codigo]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tienda->tie_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $tienda->tie_codigo)]) ?>
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
