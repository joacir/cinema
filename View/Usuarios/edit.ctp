<?php
$form = $this->Form->create('Usuario');
$form .= $this->Form->hidden('Usuario.id');
$form .= $this->Form->input('Usuario.nome', array(
    'required' => false,
    'div' => array('class' => 'form-group'),
    'class' => 'form-control', 
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
));
$form .=$this->Html->div('row',
    $this->Form->input('Usuario.login', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))    
    )) .
    $this->Form->input('Usuario.senha', array(
        'required' => false,
        'type' => 'password',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))    
    )) 
);
$form .= $this->Js->submit('Gravar', array('div' => false, 'class' => 'btn btn-success', 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/usuarios', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Alterar Usuário');
echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
