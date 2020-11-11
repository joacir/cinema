<?php
$this->extend('/Common/form');

$this->assign('title', 'Alteração da Crítica');

$formFields = $this->element('formCreate');
$formFields .= $this->Html->div('form-row',
    $this->Form->control('nome', [
        'templates' => [
            'inputContainer' => '<div class="form-group col-md-6 {{type}}">{{content}}</div>',
            'inputContainerError' => '<div class="form-group col-md-6 {{type}}{{required}} form-error">{{content}}{{error}}</div>',
        ],
    ]) .
    $this->Form->control('avaliacao', [
        'templates' => [
            'inputContainer' => '<div class="form-group col-md-6 {{type}}">{{content}}</div>',
            'inputContainerError' => '<div class="form-group col-md-6 {{type}}{{required}} form-error">{{content}}{{error}}</div>',
        ],
        'label' => ['text' => 'Avaliação'],
    ])
);
$formFields .= $this->Html->div('form-row',
    $this->Form->control('data_avaliacao', [
        'type' => 'text',
        'label' => ['text' => 'Data Avaliação'],
        'templates' => [
            'inputContainer' => '<div class="form-group col-md-6 {{type}}">{{content}}</div>',
            'inputContainerError' => '<div class="form-group col-md-6 {{type}}{{required}} form-error">{{content}}{{error}}</div>',
        ],
    ]) .
    $this->Form->control('filme_id', [
        'type' => 'select', 
        'label' => ['text' => 'Selecione o Filme'],
        'templates' => [
            'inputContainer' => '<div class="form-group col-md-6 {{type}}">{{content}}</div>',
            'inputContainerError' => '<div class="form-group col-md-6 {{type}}{{required}} form-error">{{content}}{{error}}</div>',
        ],
        'options' => $filmes
    ])
);

$this->assign('formFields', $formFields);

