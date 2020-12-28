<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tienda $tienda
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tienda->tie_codigo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tienda->tie_codigo), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tienda'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tienda form content">
            <?= $this->Form->create($tienda) ?>
            <fieldset>
                <legend><?= __('Edit Tienda') ?></legend>
                <?php
                    echo $this->Form->control('tie_direccion');
                    echo $this->Form->control('tie_rif');
                    echo $this->Form->control('FK_alm_codigo');
                    echo $this->Form->control('FK_lug_codigo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
