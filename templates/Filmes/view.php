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
            <?= $this->Html->link(__('Edit Filme'), ['action' => 'edit', $filme->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Filme'), ['action' => 'delete', $filme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filme->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Filmes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Filme'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filmes view content">
            <h3><?= h($filme->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($filme->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duracao') ?></th>
                    <td><?= h($filme->duracao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idioma') ?></th>
                    <td><?= h($filme->idioma) ?></td>
                </tr>
                <tr>
                    <th><?= __('Genero') ?></th>
                    <td><?= $filme->has('genero') ? $this->Html->link($filme->genero->id, ['controller' => 'Generos', 'action' => 'view', $filme->genero->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($filme->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ano') ?></th>
                    <td><?= $this->Number->format($filme->ano) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Ators') ?></h4>
                <?php if (!empty($filme->ators)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Nascimento') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($filme->ators as $ators) : ?>
                        <tr>
                            <td><?= h($ators->id) ?></td>
                            <td><?= h($ators->nome) ?></td>
                            <td><?= h($ators->nascimento) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Ators', 'action' => 'view', $ators->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Ators', 'action' => 'edit', $ators->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ators', 'action' => 'delete', $ators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ators->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Criticas') ?></h4>
                <?php if (!empty($filme->criticas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Avaliacao') ?></th>
                            <th><?= __('Data Avaliacao') ?></th>
                            <th><?= __('Filme Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($filme->criticas as $criticas) : ?>
                        <tr>
                            <td><?= h($criticas->id) ?></td>
                            <td><?= h($criticas->nome) ?></td>
                            <td><?= h($criticas->avaliacao) ?></td>
                            <td><?= h($criticas->data_avaliacao) ?></td>
                            <td><?= h($criticas->filme_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Criticas', 'action' => 'view', $criticas->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Criticas', 'action' => 'edit', $criticas->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Criticas', 'action' => 'delete', $criticas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $criticas->id)]) ?>
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
