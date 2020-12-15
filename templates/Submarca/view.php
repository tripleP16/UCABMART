<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Submarca $submarca
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Submarca'), ['action' => 'edit', $submarca->sub_nombre], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Submarca'), ['action' => 'delete', $submarca->sub_nombre], ['confirm' => __('Are you sure you want to delete # {0}?', $submarca->sub_nombre), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Submarca'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Submarca'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="submarca view content">
            <h3><?= h($submarca->sub_nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sub Nombre') ?></th>
                    <td><?= h($submarca->sub_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sub Descripcion') ?></th>
                    <td><?= h($submarca->sub_descripcion) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
