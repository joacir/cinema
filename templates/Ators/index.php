<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ator[]|\Cake\Collection\CollectionInterface $ators
 */
?>
<div class="ators index content">
    <?= $this->Html->link(__('New Ator'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ators') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('nascimento') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ators as $ator): ?>
                <tr>
                    <td><?= $this->Number->format($ator->id) ?></td>
                    <td><?= h($ator->nome) ?></td>
                    <td><?= h($ator->nascimento) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ator->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ator->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ator->id)]) ?>
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
