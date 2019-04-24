<?php
$detalhe = array();
foreach ($criticas as $critica) {
    $editLink = $this->Html->link('Alterar', '/criticas/edit/' . $critica['Critica']['id']);
    $deleteLink = $this->Html->link('Excluir', '/criticas/delete/' . $critica['Critica']['id']);
    $viewLink = $this->Html->link($critica['Critica']['nome'], '/criticas/view/' . $critica['Critica']['id']);
    $detalhe[] = array(
        $viewLink, 
        $critica['Critica']['avaliacao'],
        $editLink . ' ' . $deleteLink
    );
}

$titulos = array('Nome', 'Avaliação', '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/criticas/add');

echo $this->Html->tag('h1', 'Críticas');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
?>
