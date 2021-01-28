<div class="row ">

    <h3 class="white-text"><?= __('Total a pagar=') ?><?php
                echo $total;
              ?></h3>              
    <div class="col s12 white" id="inventarioCont">
        <table id="tiendas" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>Tarjeta</th>
                    <th>Numero</th>

                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $query): ?>
                <tr>
                    <td><?= h($query['met_pag_numero']) ?></td>
                    <td><?= h($query['tar_cre_cvv']) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Pagar'), ['action' => 'procesar'], ['class'=>'waves-effect waves-light btn-large black-text ']) ?>
                       
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

