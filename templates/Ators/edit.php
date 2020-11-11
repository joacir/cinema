<?php
$this->extend('/Common/form');

$this->assign('title', 'Alteração do Ator');

$formFields = $this->element('formCreate');
$formFields .= $this->Html->div('form-row',
    $this->Form->control('nome', [
        'templates' => ['inputContainer' => '<div class="form-group col-md-6 {{type}}">{{content}}</div>'],
    ]) .
    $this->Form->control('nascimento', [
        'type' => 'text',
        'templates' => ['inputContainer' => '<div class="form-group col-md-6 {{type}}">{{content}}</div>'],
    ])
);
$formFields .= $this->Form->control('filmes._ids', [
    'type' => 'select',
    'label' => ['text' => 'Selecione os Filmes'],
    'multiple' => true,
    'options' => $filmes
]);

$this->assign('formFields', $formFields);

