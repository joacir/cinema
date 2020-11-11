<?php
$this->extend('/Common/form');

$this->assign('title', 'Filme');

$formFields = $this->element('formCreate');

$formFields .= $this->Html->div('form-row', 
    $this->Form->control('nome', [
        'templates' => ['inputContainer' => '<div class="form-group col-md-6 {{type}}">{{content}}</div>'],
    ]) .
    $this->Form->control('idioma', [
        'type' => 'select',
        'options' => ['Inglês' => 'Inglês', 'Português' => 'Português', 'Espanhol' => 'Espanhol', 'Francês' => 'Francês'],
        'templates' => ['inputContainer' => '<div class="form-group col-md-6 {{type}}">{{content}}</div>'],
    ])
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->control('duracao', [
        'label' => ['text' => 'Duração'],
        'templates' => ['inputContainer' => '<div class="form-group col-md-4 {{type}}">{{content}}</div>'],
    ]) .
    $this->Form->control('ano', [
        'maxlength' => 4,
        'templates' => ['inputContainer' => '<div class="form-group col-md-4 {{type}}">{{content}}</div>'],
    ]) .
    $this->Form->control('genero_id', [
        'type' => 'select', 
        'label' => ['text' => 'Gênero'],
        'options' => $generos,
        'templates' => ['inputContainer' => '<div class="form-group col-md-4 {{type}}">{{content}}</div>'],
    ])
);
$formFields .= $this->Form->control('ators._ids', [
    'type' => 'select',
    'label' => ['text' => 'Selecione os Atores'],
    'multiple' => true, 
    'options' => $ators,
]);

$this->assign('formFields', $formFields);
