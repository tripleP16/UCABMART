<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rol $rol
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rol'), ['action' => 'edit', $rol->rol_codigo], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rol'), ['action' => 'delete', $rol->rol_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $rol->rol_codigo), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rol'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rol'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rol view content">
            <h3><?= h($rol->rol_codigo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Rol Nombre') ?></th>
                    <td><?= h($rol->rol_nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rol Codigo') ?></th>
                    <td><?= $this->Number->format($rol->rol_codigo) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cuenta Usuario') ?></h4>
                <?php if (!empty($rol->cuenta_usuario)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Cue Usu Email') ?></th>
                            <th><?= __('Cue Usu Contrasena') ?></th>
                            <th><?= __('Cue Usu Puntos') ?></th>
                            <th><?= __('FK Persona Natural') ?></th>
                            <th><?= __('FK Persona Juridica') ?></th>
                            <th><?= __('FK Empleado') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($rol->cuenta_usuario as $cuentaUsuario) : ?>
                        <tr>
                            <td><?= h($cuentaUsuario->cue_usu_email) ?></td>
                            <td><?= h($cuentaUsuario->cue_usu_contrasena) ?></td>
                            <td><?= h($cuentaUsuario->cue_usu_puntos) ?></td>
                            <td><?= h($cuentaUsuario->FK_persona_natural) ?></td>
                            <td><?= h($cuentaUsuario->FK_persona_juridica) ?></td>
                            <td><?= h($cuentaUsuario->FK_empleado) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CuentaUsuario', 'action' => 'view', $cuentaUsuario->cue_usu_email]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CuentaUsuario', 'action' => 'edit', $cuentaUsuario->cue_usu_email]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CuentaUsuario', 'action' => 'delete', $cuentaUsuario->cue_usu_email], ['confirm' => __('Are you sure you want to delete # {0}?', $cuentaUsuario->cue_usu_email)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
