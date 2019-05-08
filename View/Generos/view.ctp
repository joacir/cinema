<?php
$form = $this->Form->create('Genero');
$form .= $this->Form->input('Genero.nome', array(
    'disabled' => true,
    'div' => array('class' => 'form-group'),
    'class' => 'form-control', 
));
$form .= $this->Js->link('Voltar', '/generos', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Gênero');
echo $form;

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
