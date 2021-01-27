<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EstadoFactura[]|\Cake\Collection\CollectionInterface $estadoFactura
 */
?>

<div class="row ">
    <h3 class="white-text"><?= __('Facturas') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table id="Estados" class="responsive-table centered highlight" >
            <thead>
                <tr>
                    <th>Numero de factura</th>
                    <th>Fecha de emision</th>
                    <th>Estado</th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['fac_numero']) ?></td>
                    <td><?= h($query['fac_fecha_hora']) ?></td>
                    <td><?= h($query['est_nombre']) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit',$query['est_codigo'],$query['fac_numero']], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready( function () {
    $('#Estado').DataTable({
        
    });
    $('select').formSelect();
    $('input').css('border-top','0px')
    $('input').css('border-left','0px')
    $('input').css('border-right','0px')
} );
</script>