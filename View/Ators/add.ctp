<?php
$form = $this->Form->create('Ator');
$form .= $this->Form->input('Ator.nome', array('required' => false));
$form .= $this->Form->input('Ator.nascimento', array('type' => 'text'));
$form .= $this->Form->input('Filme.Filme', array(
    'type' => 'select',
    'multiple' => true,
    'options' => $filmes
));
$form .= $this->Form->end('Gravar');
$voltarLink = $this->Html->link('Voltar', '/ators');

echo $this->Html->tag('h1', 'Novo Ator');
echo $form;
echo $voltarLink;
?>
