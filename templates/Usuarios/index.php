<?php
$this->extend('/Common/index');

$this->assign('title', 'Usuários');

$searchFields = $this->Form->control('nome', [
    'required' => false,
    'label' => ['text' => 'Nome', 'class' => 'sr-only'],
    'templates' => [
        'input' => '<input type="{{type}}" name="{{name}}" class="form-control mb-2 mr-sm-2"{{attrs}}/>',
    ],
    'placeholder' => 'Nome...'
]);

$this->assign('searchFields', $searchFields);

$titulos = ['Nome', ''];
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = [];
foreach ($usuarios as $usuario) {
    $editLink = $this->Html->link(__('Alterar'), ['action' => 'edit', $usuario->id], ['update' => '#content']);
    $deleteLink = $this->Form->postLink(__('Excluir'), ['action' => 'delete', $usuario->id], ['update' => '#content', 'confirm' => __('Tem certeza?')]);
    $viewLink = $this->Html->link($usuario->nome, ['action' => 'view', $usuario->id], ['update' => '#content']);
    $detalhe[] = [
        $viewLink, 
        $editLink . ' ' . $deleteLink
    ];
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
