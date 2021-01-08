<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaNatural[]|\Cake\Collection\CollectionInterface $personaNatural
 */
?>
<div class="row">
    <?= $this->Html->link(__('Agregar Persona Natural'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3 class="white-text"><?= __('Persona Natural') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Tienda</th>
                    <th>Parroquia</th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['per_nat_cedula']) ?></td>
                    <td><?= h($query['per_nat_primer_nombre']) ?></td>
                    <td><?= h($query['per_nat_primer_apellido']) ?></td>
                    <td><?= h($query['per_nat_direccion']) ?></td>
                    <td><?= h($query['tie_direccion'])?></td>
                    <td><?= h($query['lug_nombre']) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['controller'=>'Reporte','action' => 'personanaturalreport', $query['per_nat_cedula'], $query['tie_codigo']], ['class'=>'waves-effect waves-light btn-small black-text ']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $query['per_nat_cedula']], ['class' => 'waves-effect yellow accent-2 btn-small black-text']) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $query['per_nat_cedula']],['class' => 'waves-effect red accent-2 btn-small white-text'], ['confirm' => __('Are you sure you want to delete # {0}?', $query['per_nat_cedula'])]) ?>
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