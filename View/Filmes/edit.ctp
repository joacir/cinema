<?php
$form = $this->Form->create('Filme');
$form .= $this->Form->hidden('Filme.id');
$form .= $this->Html->div('form-row', 
    $this->Form->input('Filme.nome', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Filme.idioma', array(
        'type' => 'select',
        'options' => array('Inglês' => 'Inglês', 'Português' => 'Português', 'Espanhol' => 'Espanhol', 'Francês' => 'Francês'),
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);
$form .= $this->Html->div('form-row', 
    $this->Form->input('Filme.duracao', array(
        'label' => array('text' => 'Duração'),
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Filme.ano', array(
        'type' => 'text', 
        'maxlength' => 4,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Filme.genero_id', array(
        'type' => 'select', 
        'label' => array('text' => 'Gênero'),
        'options' => $generos,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);
$form .= $this->Form->input('Ator.Ator', array(
    'type' => 'select',
    'label' => array('text' => 'Selecione os Atores'),
    'multiple' => true, 
    'options' => $ators,
    'div' => array('class' => 'form-group'),
    'class' => 'form-control', 
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
));
$form .= $this->Js->submit('Gravar', array('class' => 'btn btn-success', 'div' => false, 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/filmes', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Alterar Filme');
echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}