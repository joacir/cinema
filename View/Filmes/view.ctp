<?php
$this->extend('/Common/form');

$this->assign('title', 'Visualizar Filme');

$formFields = $this->element('formCreate');

$formFields = $this->Html->div('form-row', 
    $this->Form->input('Filme.nome', array(
        'div' => array('class' => 'form-group col-md-6'),
    )) .
    $this->Form->input('Filme.idioma', array(
        'type' => 'select',
        'options' => array('Inglês' => 'Inglês', 'Português' => 'Português', 'Espanhol' => 'Espanhol', 'Francês' => 'Francês'),
        'div' => array('class' => 'form-group col-md-6'),
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Filme.duracao', array(
        'label' => array('text' => 'Duração'),
        'div' => array('class' => 'form-group col-md-4'),
    )) .
    $this->Form->input('Filme.ano', array(
        'div' => array('class' => 'form-group col-md-4'),
    )) .
    $this->Form->input('Filme.genero_id', array(
        'type' => 'select', 
        'label' => array('text' => 'Gênero'),
        'options' => $generos,
        'div' => array('class' => 'form-group col-md-4'),
    ))
);
$formFields .= $this->Form->input('Ator.Ator', array(
    'type' => 'select',
    'label' => array('text' => 'Selecione os Atores'),
    'multiple' => true, 
    'options' => $ators,
));

$this->assign('formFields', $formFields);
