<?php
$this->extend('/Common/form');

$this->assign('title', 'Alteração do Usuário');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->control('nome');
$formFields .=$this->Html->div('row',
    $this->Form->control('login', [
        'templates' => ['inputContainer' => '<div class="form-group col-md-6 {{type}}">{{content}}</div>'],
    ]) .
    $this->Form->control('senha', [
        'type' => 'password',
        'templates' => ['inputContainer' => '<div class="form-group col-md-6 {{type}}">{{content}}</div>'],
    ]) 
);

$this->assign('formFields', $formFields);
