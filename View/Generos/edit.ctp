<?php
$form = $this->Form->create('Genero');
$form .= $this->Form->hidden('Genero.id');
$form .= $this->Form->input('Genero.nome', array(
    'required' => false,
    'div' => array('class' => 'form-group'),
    'class' => 'form-control', 
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
));
$form .= $this->Js->submit('Gravar', array('div' => false, 'class' => 'btn btn-success', 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/generos', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Alterar Gênero');
echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
