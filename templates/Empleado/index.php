<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empleado[]|\Cake\Collection\CollectionInterface $empleado
 */
?>
<div class="row ">
<?= $this->Html->link(__('Contratar Empleado'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3 class="white-text"><?= __('Empleado') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>Ceddula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Parroquia</th>
                    <th>Tienda</th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['emp_cedula']) ?></td>
                    <td><?= h($query['emp_primer_nombre']) ?></td>
                    <td><?= h($query['emp_primer_apellido']) ?></td>
                    <td><?= h($query['lug_nombre']) ?></td>
                    <td><?= h($query['tie_direccion']) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'View', $query['emp_cedula']], ['class'=>'waves-effect waves-light btn-large black-text ']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'Edit',$query['emp_cedula']], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'Delete',$query['emp_cedula']],['class' => 'waves-effect red accent-2 btn-large white-text'], ['confirm' => __('Are you sure you want to delete # {0}?', $query['emp_cedula'])]) ?>
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










