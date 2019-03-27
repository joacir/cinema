<?php
$form = $this->Form->create('Filme');
$form .= $this->Form->input('Filme.nome', array('required' => false));
$form .= $this->Form->input('Filme.idioma');
$form .= $this->Form->input('Filme.duracao', array('label' => array('text' => 'Duração')));
$form .= $this->Form->input('Filme.ano', array('type' => 'text', 'maxlength' => 4));
$form .= $this->Form->end('Gravar');
$voltarLink = $this->Html->link('Voltar', '/filmes');

echo $this->Html->tag('h1', 'Novo Filme');
echo $form;
echo $voltarLink;
?>
