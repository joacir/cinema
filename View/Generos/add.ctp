<?php
$form = $this->Form->create('Genero');
$form .= $this->Form->input('Genero.nome', array('required' => false));
$form .= $this->Form->end('Gravar');
$voltarLink = $this->Html->link('Voltar', '/generos');

echo $this->Html->tag('h1', 'Novo Gênero');
echo $form;
echo $voltarLink;
?>
