<?php
$this->extend('/Common/index');

$this->assign('title', 'Usuários');

$searchFields = $this->Form->input('Usuario.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));

$this->assign('searchFields', $searchFields);

$titulos = array('Nome', '');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();
foreach ($usuarios as $usuario) {
    $editLink = $this->Js->link('Alterar', '/usuarios/edit/' . $usuario['Usuario']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/usuarios/delete/' . $usuario['Usuario']['id'], array('update' => '#content', 'confirm' => 'Tem certeza?'));
    $viewLink = $this->Js->link($usuario['Usuario']['nome'], '/usuarios/view/' . $usuario['Usuario']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        $editLink . ' ' . $deleteLink
    );
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
