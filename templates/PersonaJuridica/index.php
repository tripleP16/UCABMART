<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonaJuridica[]|\Cake\Collection\CollectionInterface $personaJuridica
 */
?>
<div class="row ">
    <?= $this->Html->link(__('Agregar Persona Juridica'), ['action' => 'add'], ['class' => 'waves-effect yellow accent-2 btn-large black-text']) ?>
    <h3 class="white-text"><?= __('Personas Juridicas') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table  id="tiendas" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>RIF</th>
                    <th>Denominacion Comercial</th>
                    <th>Capital disponible</th>
                    <th>Tienda</th>
                    <th>Parroquia Fiscal Principal</th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['per_jur_rif']) ?></td>
                    <td><?= h($query['per_jur_denominacion_comercial']) ?></td>
                    <td><?= $this->Number->format($query['per_jur_capital_disponible']) ?></td>
                    <td><?= h($query['tie_direccion']) ?></td>
                    <td><?= h($query['lug_nombre']) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $query['per_jur_rif']],['class'=>'waves-effect waves-light btn-small black-text ']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $query['per_jur_rif']], ['class' => 'waves-effect yellow accent-2 btn-small black-text']) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $query['per_jur_rif']],['class' => 'waves-effect red accent-2 btn-small  white-text'], ['confirm' => __('Are you sure you want to delete # {0}?', $query['per_jur_rif'])]) ?>
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
