<?php
$form = $this->Form->create('Usuario');
$form .= $this->Form->input('Usuario.nome', array(
    'disabled' => true,
    'div' => array('class' => 'form-group'),
    'class' => 'form-control'
));
$form .=$this->Html->div('row',
    $this->Form->input('Usuario.login', array(
        'disabled' => true,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control'
    )) .
    $this->Form->input('Usuario.senha', array(
        'disabled' => true,
        'type' => 'password',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control'
    )) 
);
$form .= $this->Form->input('Usuario.aro_parent_id', array(
    'div' => array('class' => 'form-group'),
    'class' => 'form-control', 
    'type' => 'select',
    'options' => $aros,
    'disabled' => true,
));

$form .= $this->Js->link('Voltar', '/usuarios', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Usuário');
echo $form;

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
