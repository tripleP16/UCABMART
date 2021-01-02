<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Almacen $almacen
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Almacen'), ['action' => 'edit', $almacen->alm_codigo], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Almacen'), ['action' => 'delete', $almacen->alm_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $almacen->alm_codigo), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Almacen'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Almacen'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="almacen view content">
            <h3><?= h($almacen->alm_codigo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Alm Dirección') ?></th>
                    <td><?= h($almacen->alm_dirección) ?></td>
                </tr>
                <tr>
                    <th><?= __('Alm Codigo') ?></th>
                    <td><?= $this->Number->format($almacen->alm_codigo) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
