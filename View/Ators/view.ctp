<?php
$this->extend('/Common/form');

$this->assign('title', 'Visualizar Ator');

$formFields = $this->element('formCreate');
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Ator.nome', array(
        'div' => array('class' => 'form-group col-md-6'),
    )) .
    $this->Form->input('Ator.nascimento', array(
        'div' => array('class' => 'form-group col-md-6'),
    ))
);
$formFields .= $this->Form->input('Filme.Filme', array(
    'type' => 'select',
    'label' => array('text' => 'Selecione os Filmes'),
    'multiple' => true,
    'options' => $filmes
));

$this->assign('formFields', $formFields);
