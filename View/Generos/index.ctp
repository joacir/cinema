<?php
$this->extend('/Common/index');

$this->assign('title', 'Gêneros');

$searchFields = $this->Form->input('Genero.nome', array(
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
foreach ($generos as $genero) {
    $editLink = $this->Js->link('Alterar', '/generos/edit/' . $genero['Genero']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/generos/delete/' . $genero['Genero']['id'], array('update' => '#content', 'confirm' => 'Tem certeza?'));
    $viewLink = $this->Js->link($genero['Genero']['nome'], '/generos/view/' . $genero['Genero']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        $editLink . ' ' . $deleteLink
    );
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);

