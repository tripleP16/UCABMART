<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Almacen[]|\Cake\Collection\CollectionInterface $almacen
 */
?>
<div class="almacen index content">
    <?= $this->Html->link(__('New Almacen'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Almacen') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('alm_codigo') ?></th>
                    <th><?= $this->Paginator->sort('alm_dirección') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($almacen as $almacen): ?>
                <tr>
                    <td><?= $this->Number->format($almacen->alm_codigo) ?></td>
                    <td><?= h($almacen->alm_dirección) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $almacen->alm_codigo]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $almacen->alm_codigo]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $almacen->alm_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $almacen->alm_codigo)]) ?>
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
