<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genero $genero
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Genero'), ['action' => 'edit', $genero->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Genero'), ['action' => 'delete', $genero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genero->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Generos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Genero'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="generos view content">
            <h3><?= h($genero->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($genero->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($genero->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Filmes') ?></h4>
                <?php if (!empty($genero->filmes)) : ?>
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
                        <?php foreach ($genero->filmes as $filmes) : ?>
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
