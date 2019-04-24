<?php
$form = $this->Form->create('Filme');
$form .= $this->Form->hidden('Filme.id');
$form .= $this->Form->input('Filme.nome');
$form .= $this->Form->input('Filme.idioma', array(
    'type' => 'select',
    'options' => array('Inglês' => 'Inglês', 'Português' => 'Português', 'Espanhol' => 'Espanhol', 'Francês' => 'Francês')    
));
$form .= $this->Form->input('Filme.duracao');
$form .= $this->Form->input('Filme.ano');
$form .= $this->Form->input('Filme.genero_id', array(
    'type' => 'select', 
    'options' => $generos
));
$form .= $this->Form->input('Ator.Ator', array(
    'type' => 'select',
    'multiple' => true, 
    'options' => $ators
));
$form .= $this->Form->end('Gravar');
$voltarLink = $this->Html->link('Voltar', '/filmes');

echo $this->Html->tag('h1', 'Alterar Filme');
echo $form;
echo $voltarLink;
?>
