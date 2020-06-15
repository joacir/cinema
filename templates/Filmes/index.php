<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Filme[]|\Cake\Collection\CollectionInterface $filmes
 */
?>
<div class="filmes index content">
    <?= $this->Html->link(__('New Filme'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Filmes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('ano') ?></th>
                    <th><?= $this->Paginator->sort('duracao') ?></th>
                    <th><?= $this->Paginator->sort('idioma') ?></th>
                    <th><?= $this->Paginator->sort('genero_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filmes as $filme): ?>
                <tr>
                    <td><?= $this->Number->format($filme->id) ?></td>
                    <td><?= h($filme->nome) ?></td>
                    <td><?= $this->Number->format($filme->ano) ?></td>
                    <td><?= h($filme->duracao) ?></td>
                    <td><?= h($filme->idioma) ?></td>
                    <td><?= $filme->has('genero') ? $this->Html->link($filme->genero->id, ['controller' => 'Generos', 'action' => 'view', $filme->genero->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $filme->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filme->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filme->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
