<?php
$view = $this->Html->tag('h2', 'Nome');
$view .= $this->Html->para('', $this->request->data['Ator']['nome']);
$view .= $this->Html->tag('h2', 'Nascimento');
$view .= $this->Html->para('', date('d/m/Y', strtotime($this->request->data['Ator']['nascimento'])));
$view .= $this->Html->tag('h2', 'Filmes');
foreach ($this->request->data['Filme'] as $filme) {
    $view .= $this->Html->para('', $filme['nome']);
}
$voltarLink = $this->Html->link('Voltar', '/ators');

echo $this->Html->tag('h1', 'Visualizar Ator');
echo $view;
echo $voltarLink;
?>
