<?php
$this->extend('/Common/index');

$this->assign('title', 'Filmes');

$searchFields = $this->Form->control('nome_or_idioma', [
    'required' => false,
    'label' => ['text' => 'Nome', 'class' => 'sr-only'],
    'templates' => [
        'input' => '<input type="{{type}}" name="{{name}}" class="form-control mb-2 mr-sm-2"{{attrs}}/>',
    ],
    'placeholder' => 'Nome...'
]);
$this->assign('searchFields', $searchFields);

$titulos = ['Nome', 'Ano', 'Gênero', ''];
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = [];
foreach ($filmes as $filme) {
    $editLink = $this->Html->link(__('Alterar'), ['action' => 'edit', $filme->id], ['update' => '#content']);
    $deleteLink = $this->Form->postLink(__('Excluir'), ['action' => 'delete', $filme->id], ['update' => '#content', 'confirm' => __('Tem certeza?')]);
    $viewLink = $this->Html->link($filme->nome, ['action' => 'view', $filme->id], ['update' => '#content']);
    $detalhe[] = [
        $viewLink, 
        (string)$filme->ano,
        $filme->genero->nome,
        $editLink . ' ' . $deleteLink
    ];
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);

