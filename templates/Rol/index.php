<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rol[]|\Cake\Collection\CollectionInterface $rol
 */
?>
<div class="rol index content">
    <?= $this->Html->link(__('New Rol'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Rol') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('rol_codigo') ?></th>
                    <th><?= $this->Paginator->sort('rol_nombre') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rol as $rol): ?>
                <tr>
                    <td><?= $this->Number->format($rol->rol_codigo) ?></td>
                    <td><?= h($rol->rol_nombre) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rol->rol_codigo]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rol->rol_codigo]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rol->rol_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $rol->rol_codigo)]) ?>
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
