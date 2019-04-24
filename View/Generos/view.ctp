<?php
$view = $this->Html->tag('h2', 'Nome');
$view .= $this->Html->para('', $this->request->data['Genero']['nome']);
$voltarLink = $this->Html->link('Voltar', '/generos');

echo $this->Html->tag('h1', 'Visualizar Gênero');
echo $view;
echo $voltarLink;
?>
