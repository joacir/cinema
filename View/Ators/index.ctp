<?php
$detalhe = array();
foreach ($ators as $ator) {
    $editLink = $this->Html->link('Alterar', '/ators/edit/' . $ator['Ator']['id']);
    $deleteLink = $this->Html->link('Excluir', '/ators/delete/' . $ator['Ator']['id']);
    $viewLink = $this->Html->link($ator['Ator']['nome'], '/ators/view/' . $ator['Ator']['id']);
    $detalhe[] = array(
        $viewLink, 
        date('d/m/Y', strtotime($ator['Ator']['nascimento'])),
        $editLink . ' ' . $deleteLink
    );
}


$titulos = array('Nome', 'Nascimento', '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/ators/add');

echo $this->Html->tag('h1', 'Atores');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
?>
