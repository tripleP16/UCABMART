<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TarjetaDeCredito[]|\Cake\Collection\CollectionInterface $tarjetaDeCredito
 */
?>
<div class="row ">
    <?= $this->Html->link(__('Añadir una nueva tarjeta'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <?= $this->Html->link(__('Ver Carrito'), ['controller'=>'CarritoDeComprasVirtual','action' => 'index'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>  
    <h3 class="white-text"><?= __('Tarjetas') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight" >
            <thead>
                <tr>
                    <th>Numero De tarjeta</th>
                    <th>Nombre del titular</th>
                    <th>Fecha de emision</th>
                    <th>CVV</th>
                    <th>Tipo de tarjeta</th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['met_pag_numero']) ?></td>
                    <td><?= h($query['tar_cre_nombre']) ?></td>
                    <td><?= h($query['tar_cre_fecha_emision']) ?></td>
                    <td><?= h($query['tar_cre_cvv']) ?></td>
                    <td><?= h($query['tar_cre_tipo']) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $query['met_pag_numero']], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $query['met_pag_numero']],['class' => 'waves-effect red accent-2 btn-large white-text'], ['confirm' => __('Estas seguro # {0}?', $query['met_pag_numero'])]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready( function () {
    $('#tiendas').DataTable({
        
    });
    $('select').formSelect();
    $('input').css('border-top','0px')
    $('input').css('border-left','0px')
    $('input').css('border-right','0px')
} );
</script>

