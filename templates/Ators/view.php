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
            <?= $this->Html->link(__('Edit Ator'), ['action' => 'edit', $ator->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ator'), ['action' => 'delete', $ator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ator->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ators'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ator'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ators view content">
            <h3><?= h($ator->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($ator->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ator->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nascimento') ?></th>
                    <td><?= h($ator->nascimento) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Filmes') ?></h4>
                <?php if (!empty($ator->filmes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Ano') ?></th>
                            <th><?= __('Duracao') ?></th>
                            <th><?= __('Idioma') ?></th>
                            <th><?= __('Genero Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($ator->filmes as $filmes) : ?>
                        <tr>
                            <td><?= h($filmes->id) ?></td>
                            <td><?= h($filmes->nome) ?></td>
                            <td><?= h($filmes->ano) ?></td>
                            <td><?= h($filmes->duracao) ?></td>
                            <td><?= h($filmes->idioma) ?></td>
                            <td><?= h($filmes->genero_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Filmes', 'action' => 'view', $filmes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Filmes', 'action' => 'edit', $filmes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Filmes', 'action' => 'delete', $filmes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filmes->id)]) ?>
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
