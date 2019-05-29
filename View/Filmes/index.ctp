<?php
$this->extend('/Common/index');

$this->assign('title', 'Filmes');

$searchFields = $this->Form->input('Filme.nome_or_idioma', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));
$this->assign('searchFields', $searchFields);

$titulos = array('Nome', 'Ano', 'Gênero',  '');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();
foreach ($filmes as $filme) {
    $editLink = $this->Js->link('Alterar', '/filmes/edit/' . $filme['Filme']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/filmes/delete/' . $filme['Filme']['id'], array('update' => '#content', 'confirm' => 'Tem certeza?'));
    $viewLink = $this->Js->link($filme['Filme']['nome'], '/filmes/view/' . $filme['Filme']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        $filme['Filme']['ano'],
        $filme['Genero']['nome'],
        $editLink . ' ' . $deleteLink
    );
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);

