<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TarjetaDeCredito $tarjetaDeCredito
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tarjeta De Credito'), ['action' => 'edit', $tarjetaDeCredito->met_pag_numero], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tarjeta De Credito'), ['action' => 'delete', $tarjetaDeCredito->met_pag_numero], ['confirm' => __('Are you sure you want to delete # {0}?', $tarjetaDeCredito->met_pag_numero), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tarjeta De Credito'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tarjeta De Credito'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tarjetaDeCredito view content">
            <h3><?= h($tarjetaDeCredito->met_pag_numero) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tar Cre Nombre') ?></th>
                    <td><?= h($tarjetaDeCredito->tar_cre_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tar Cre Tipo') ?></th>
                    <td><?= h($tarjetaDeCredito->tar_cre_tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Met Pag Numero') ?></th>
                    <td><?= $this->Number->format($tarjetaDeCredito->met_pag_numero) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tar Cre Cvv') ?></th>
                    <td><?= $this->Number->format($tarjetaDeCredito->tar_cre_cvv) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Emi Codigo') ?></th>
                    <td><?= $this->Number->format($tarjetaDeCredito->FK_emi_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tar Cre Fecha Emision') ?></th>
                    <td><?= h($tarjetaDeCredito->tar_cre_fecha_emision) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
