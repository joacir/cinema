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
            <?= $this->Html->link(__('Edit Critica'), ['action' => 'edit', $critica->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Critica'), ['action' => 'delete', $critica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $critica->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Criticas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Critica'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="criticas view content">
            <h3><?= h($critica->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($critica->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Filme') ?></th>
                    <td><?= $critica->has('filme') ? $this->Html->link($critica->filme->id, ['controller' => 'Filmes', 'action' => 'view', $critica->filme->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($critica->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Avaliacao') ?></th>
                    <td><?= $this->Number->format($critica->avaliacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Avaliacao') ?></th>
                    <td><?= h($critica->data_avaliacao) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
