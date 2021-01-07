<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proveedor[]|\Cake\Collection\CollectionInterface $proveedor
 */
?>
<div class="row">
    <?= $this->Html->link(__('Crear Provedor'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3 class="white-text"><?= __('Proveedores') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>RIF</th>
                    <th>Razon Social</th>
                    <th>Localizado en </th>
                    <th>Fiscaliza en </th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['pro_rif']) ?></td>
                    <td><?= h($query['pro_razon_social']) ?></td>
                    <td><?= h($query['lugar']) ?></td>
                    <td><?= h($query['lugar_fiscal']) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $query['pro_rif']], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $query['pro_rif']],['class' => 'waves-effect red accent-2 btn-large white-text'], ['confirm' => __('Are you sure you want to delete # {0}?',$query['pro_rif'])]) ?>
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
