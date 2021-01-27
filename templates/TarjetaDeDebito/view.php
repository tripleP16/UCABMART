<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TarjetaDeDebito $tarjetaDeDebito
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tarjeta De Debito'), ['action' => 'edit', $tarjetaDeDebito->met_pag_numero], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tarjeta De Debito'), ['action' => 'delete', $tarjetaDeDebito->met_pag_numero], ['confirm' => __('Are you sure you want to delete # {0}?', $tarjetaDeDebito->met_pag_numero), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tarjeta De Debito'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tarjeta De Debito'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tarjetaDeDebito view content">
            <h3><?= h($tarjetaDeDebito->met_pag_numero) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tar Deb Tipo Cuenta') ?></th>
                    <td><?= h($tarjetaDeDebito->tar_deb_tipo_cuenta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tar Deb Tipo') ?></th>
                    <td><?= h($tarjetaDeDebito->tar_deb_tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tar Deb Titular') ?></th>
                    <td><?= h($tarjetaDeDebito->tar_deb_titular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Met Pag Numero') ?></th>
                    <td><?= $this->Number->format($tarjetaDeDebito->met_pag_numero) ?></td>
                </tr>
                <tr>
                    <th><?= __('FK Emi Codigo') ?></th>
                    <td><?= $this->Number->format($tarjetaDeDebito->FK_emi_codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tar Deb Cvv') ?></th>
                    <td><?= $this->Number->format($tarjetaDeDebito->tar_deb_cvv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tar Deb Fecha Emision') ?></th>
                    <td><?= h($tarjetaDeDebito->tar_deb_fecha_emision) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
