<?php
$form = $this->Form->create('Ator');
$form .= $this->Html->div('form-row',
    $this->Form->input('Ator.nome', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Ator.nascimento', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'type' => 'text',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);
$form .= $this->Form->input('Filme.Filme', array(
    'type' => 'select',
    'div' => array('class' => 'form-group'),
    'class' => 'form-control',
    'label' => array('text' => 'Selecione os Filmes'),
    'error' => array('attributes' => array('class' => 'invalid-feedback')),
    'multiple' => true,
    'options' => $filmes
));
$form .= $this->Form->button('Gravar', array('type' => 'submit', 'class' => 'btn btn-success'));
$form .= $this->Html->link('Voltar', '/ators', array('class' => 'btn btn-secondary ml-3'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Novo Ator');
echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');
?>
