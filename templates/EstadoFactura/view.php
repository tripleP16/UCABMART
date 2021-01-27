<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EstadoFactura $estadoFactura
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Estado Factura'), ['action' => 'edit', $estadoFactura->est_codigo], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Estado Factura'), ['action' => 'delete', $estadoFactura->est_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $estadoFactura->est_codigo), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Estado Factura'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Estado Factura'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="estadoFactura view content">
            <h3><?= h($estadoFactura->est_codigo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Est Codigo') ?></th>
                    <td><?= $this->Number->format($estadoFactura->est_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fac Numero') ?></th>
                    <td><?= $this->Number->format($estadoFactura->fac_numero) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fac Fecha Hora') ?></th>
                    <td><?= h($estadoFactura->fac_fecha_hora) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
