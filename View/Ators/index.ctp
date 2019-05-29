<?php
$this->extend('/Common/index');

$this->assign('title', 'Atores');

$searchFields = $this->Form->input('Ator.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));

$this->assign('searchFields', $searchFields);

$nomeSort = $this->Paginator->sort('Ator.nome', 'Nome');
$nascimentoSort = $this->Paginator->sort('Ator.nascimento', 'Nascimento');
$titulos = array($nomeSort, $nascimentoSort, '');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();
foreach ($ators as $ator) {
    $editLink = $this->Js->link('Alterar', '/ators/edit/' . $ator['Ator']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/ators/delete/' . $ator['Ator']['id'], array('update' => '#content', 'confirm' => 'Tem certeza?'));
    $viewLink = $this->Js->link($ator['Ator']['nome'], '/ators/view/' . $ator['Ator']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        date('d/m/Y', strtotime($ator['Ator']['nascimento'])),
        $editLink . ' ' . $deleteLink
    );
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
