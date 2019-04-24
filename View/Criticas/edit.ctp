<?php
$this->request->data['Critica']['data_avaliacao'] = date('d/m/Y', strtotime($this->request->data['Critica']['data_avaliacao']));
$form = $this->Form->create('Critica');
$form .= $this->Form->hidden('Critica.id');
$form .= $this->Form->input('Critica.nome', array('required' => false));
$form .= $this->Form->input('Critica.avaliacao');
$form .= $this->Form->input('Critica.data_avaliacao', array('type' => 'text'));
$form .= $this->Form->input('Critica.filme_id', array('type' => 'select', 'options' => $filmes));
$form .= $this->Form->end('Gravar');
$voltarLink = $this->Html->link('Voltar', '/criticas');

echo $this->Html->tag('h1', 'Alterar Crítica');
echo $form;
echo $voltarLink;
?>
