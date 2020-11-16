<?php
$this->extend('/Common/index');

$this->assign('title', 'Críticas');

$searchFields = $this->Form->control('nome', [
    'required' => false,
    'label' => ['text' => 'Nome', 'class' => 'sr-only'],
    'templates' => [
        'input' => '<input type="{{type}}" name="{{name}}" class="form-control mb-2 mr-sm-2"{{attrs}}/>',
    ],
    'placeholder' => 'Nome...'
]);

$this->assign('searchFields', $searchFields);

$titulos = ['Nome', 'Avaliação', ''];
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = [];
foreach ($criticas as $critica) {
    $editLink = $this->Html->link(__('Alterar'), ['action' =>'edit', $critica->id], ['update' => '#content']);
    $deleteLink = $this->Form->postLink(__('Excluir'), ['action' => 'delete', $critica->id], ['update' => '#content', 'confirm' => __('Tem certeza?')]);
    $viewLink = $this->Html->link($critica->nome, ['action' => 'view', $critica->id], ['update' => '#content']);
    $detalhe[] = [
        $viewLink, 
        (string)$critica->avaliacao,
        $editLink . ' ' . $deleteLink
    ];
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
