<?php
$this->extend('/Common/index');

$this->assign('title', 'Gêneros');

$searchFields = $this->Form->control('Genero.nome', [
    'required' => false,
    'label' => ['text' => 'Nome', 'class' => 'sr-only'],
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
]);

$this->assign('searchFields', $searchFields);

$titulos = ['Nome', ''];
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = [];
foreach ($generos as $genero) {
    $editLink = $this->Html->link(__('Alterar'), ['action' => 'edit', $genero->id], ['update' => '#content']);
    $deleteLink = $this->Form->postLink(__('Excluir'), ['action' => 'delete', $genero->id], ['update' => '#content', 'confirm' => __('Tem certeza?')]);
    $viewLink = $this->Html->link($genero->nome, ['action' => 'view', $genero->id], ['update' => '#content']);
    $detalhe[] = [
        $viewLink, 
        $editLink . ' ' . $deleteLink
    ];
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);

