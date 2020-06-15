<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ator $ator
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ators'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ators form content">
            <?= $this->Form->create($ator) ?>
            <fieldset>
                <legend><?= __('Add Ator') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('nascimento', ['empty' => true]);
                    echo $this->Form->control('filmes._ids', ['options' => $filmes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
