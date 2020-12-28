<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tienda $tienda
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tienda'), ['action' => 'edit', $tienda->tie_codigo], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tienda'), ['action' => 'delete', $tienda->tie_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $tienda->tie_codigo), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tienda'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tienda'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tienda view content">
            <h3><?= h($tienda->tie_codigo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tie Direccion') ?></th>
                    <td><?= h($tienda->tie_direccion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tie Codigo') ?></th>
                    <td><?= $this->Number->format($tienda->tie_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tie Rif') ?></th>
                    <td><?= $this->Number->format($tienda->tie_rif) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Alm Codigo') ?></th>
                    <td><?= $this->Number->format($tienda->FK_alm_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Lug Codigo') ?></th>
                    <td><?= $this->Number->format($tienda->FK_lug_codigo) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
