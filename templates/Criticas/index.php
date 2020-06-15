<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critica[]|\Cake\Collection\CollectionInterface $criticas
 */
?>
<div class="criticas index content">
    <?= $this->Html->link(__('New Critica'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Criticas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('avaliacao') ?></th>
                    <th><?= $this->Paginator->sort('data_avaliacao') ?></th>
                    <th><?= $this->Paginator->sort('filme_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($criticas as $critica): ?>
                <tr>
                    <td><?= $this->Number->format($critica->id) ?></td>
                    <td><?= h($critica->nome) ?></td>
                    <td><?= $this->Number->format($critica->avaliacao) ?></td>
                    <td><?= h($critica->data_avaliacao) ?></td>
                    <td><?= $critica->has('filme') ? $this->Html->link($critica->filme->id, ['controller' => 'Filmes', 'action' => 'view', $critica->filme->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $critica->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $critica->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $critica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $critica->id)]) ?>
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
