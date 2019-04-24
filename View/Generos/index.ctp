<?php
$detalhe = array();
foreach ($generos as $genero) {
    $editLink = $this->Html->link('Alterar', '/generos/edit/' . $genero['Genero']['id']);
    $deleteLink = $this->Html->link('Excluir', '/generos/delete/' . $genero['Genero']['id']);
    $viewLink = $this->Html->link($genero['Genero']['nome'], '/generos/view/' . $genero['Genero']['id']);
    $detalhe[] = array(
        $viewLink, 
        $editLink . ' ' . $deleteLink
    );
}

$titulos = array('Nome', '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/generos/add');

echo $this->Html->tag('h1', 'Gêneros');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
?>
