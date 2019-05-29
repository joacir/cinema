<?php
$this->extend('/Common/index');

$this->assign('title', 'Críticas');

$searchFields = $this->Form->input('Critica.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));

$this->assign('searchFields', $searchFields);

$titulos = array('Nome', 'Avaliação', '');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();
foreach ($criticas as $critica) {
    $editLink = $this->Js->link('Alterar', '/criticas/edit/' . $critica['Critica']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/criticas/delete/' . $critica['Critica']['id'], array('update' => '#content', 'confirm' => 'Tem certeza?'));
    $viewLink = $this->Js->link($critica['Critica']['nome'], '/criticas/view/' . $critica['Critica']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        $critica['Critica']['avaliacao'],
        $editLink . ' ' . $deleteLink
    );
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);

