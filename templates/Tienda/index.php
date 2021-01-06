<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tienda[]|\Cake\Collection\CollectionInterface $tienda
 */
?>
<div class="row ">
    <?= $this->Html->link(__('Crear Tienda'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3 class="white-text"><?= __('Tiendas') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight" >
            <thead>
                <tr>
                    <th>Direccion de la tienda</th>
                    <th>Rif de la tienda</th>
                    <th>Codigo del almacen</th>
                    <th>Parroquia</th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['tie_direccion']) ?></td>
                    <td><?= h($query['tie_rif']) ?></td>
                    <td><?= $this->Number->format($query['FK_alm_codigo']) ?></td>
                    <td><?= h($query['lug_nombre']) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['controller'=>'ZonaProducto', 'action' => 'index', $query['FK_alm_codigo']], ['class'=>'waves-effect waves-light btn-large black-text ']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $query['tie_codigo']], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $query['tie_codigo']],['class' => 'waves-effect red accent-2 btn-large white-text'], ['confirm' => __('Estas seguro # {0}?', $query['tie_codigo'])]) ?>
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
