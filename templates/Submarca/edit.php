<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Submarca $submarca
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $submarca->sub_nombre],
                ['confirm' => __('Are you sure you want to delete # {0}?', $submarca->sub_nombre), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Submarca'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="submarca form content">
            <?= $this->Form->create($submarca) ?>
            <fieldset>
                <legend><?= __('Edit Submarca') ?></legend>
                <?php
                    echo $this->Form->control('sub_descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
