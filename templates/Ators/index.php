<?php
$this->extend('/Common/index');

$this->assign('title', 'Atores');

$searchFields = $this->Form->control('nome', [
    'required' => false,
    'label' => ['text' => 'Nome', 'class' => 'sr-only'],
    'templates' => [
        'input' => '<input type="{{type}}" name="{{name}}" class="form-control mb-2 mr-sm-2"{{attrs}}/>',
    ],
    'placeholder' => 'Nome...'
]);

$this->assign('searchFields', $searchFields);

$nomeSort = $this->Paginator->sort('Ator.nome', 'Nome');
$nascimentoSort = $this->Paginator->sort('Ator.nascimento', 'Nascimento');
$titulos = [$nomeSort, $nascimentoSort, ''];
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = [];
foreach ($ators as $ator) {
    $editLink = $this->Html->link(__('Alterar'), ['action' => 'edit', $ator->id], ['update' => '#content']);
    $deleteLink = $this->Form->postLink(__('Excluir'), ['action' => 'delete', $ator->id], ['update' => '#content', 'confirm' => __('Tem certeza?')]);
    $viewLink = $this->Html->link($ator->nome, ['action' => 'view', $ator->id], ['update' => '#content']);
    $detalhe[] = [
        $viewLink, 
        $ator->nascimento->format('d/m/Y'),
        $editLink . ' ' . $deleteLink
    ];
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
