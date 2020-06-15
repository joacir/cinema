<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critica $critica
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $critica->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $critica->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Criticas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="criticas form content">
            <?= $this->Form->create($critica) ?>
            <fieldset>
                <legend><?= __('Edit Critica') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('avaliacao');
                    echo $this->Form->control('data_avaliacao', ['empty' => true]);
                    echo $this->Form->control('filme_id', ['options' => $filmes, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
