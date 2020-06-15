<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Filme $filme
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Filmes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmes form content">
            <?= $this->Form->create($filme) ?>
            <fieldset>
                <legend><?= __('Add Filme') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('ano');
                    echo $this->Form->control('duracao');
                    echo $this->Form->control('idioma');
                    echo $this->Form->control('genero_id', ['options' => $generos, 'empty' => true]);
                    echo $this->Form->control('ators._ids', ['options' => $ators]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
