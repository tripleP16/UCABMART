<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductoNotimart $productoNotimart
 */
?>

<div class="row">
    <h3 class="white-text"><?= __('Notimart') ?></h3>
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>Fecha del notimart</th>
                    <th>Cantidad de productos en descuento</th>

                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['prod_not_fecha_inicio']) ?></td>
                    <td><?= h($query['Cantidad']) ?></td>
                    <td class="actions">
                    <?= $this->Html->link(__('Ver Notimart'), ['controller' => 'reporte','action' => 'notimartreport', $query['prod_not_fecha_inicio']], ['class'=>'waves-effect waves-light btn-small black-text ']) ?>
                       
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>