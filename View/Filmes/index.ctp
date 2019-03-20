<?php
$detalhe = array();
foreach ($filmes as $filme) {
    $detalhe[] = array(
        $filme['Filme']['nome'], 
        $filme['Filme']['ano'], 
//        $filme['Filme']['duracao'], 
//        $filme['Filme']['idioma']
    );
}

echo $this->Html->tag('h1', 'Filmes');

$titulos = array('Nome', 'Ano'/*, 'Duração', 'Idioma'*/);
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);

echo $this->Html->tag('table', $header . $body);
?>
