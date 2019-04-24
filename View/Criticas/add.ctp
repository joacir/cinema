<?php
$form = $this->Form->create('Critica');
$form .= $this->Form->input('Critica.nome', array('required' => false));
$form .= $this->Form->input('Critica.avaliacao');
$form .= $this->Form->input('Critica.data_avaliacao', array('type' => 'text'));
$form .= $this->Form->input('Critica.filme_id', array('type' => 'select', 'options' => $filmes));
$form .= $this->Form->end('Gravar');
$voltarLink = $this->Html->link('Voltar', '/criticas');

echo $this->Html->tag('h1', 'Novo Crítica');
echo $form;
echo $voltarLink;
?>
