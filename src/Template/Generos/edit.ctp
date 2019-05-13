<?php
$this->Form->setTemplates([
    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
    'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
    'inputContainerError' => '<div class="form-group {{type}}{{required}}">{{content}}{{error}}</div>',
    'error' => '<div class="invalid-feedback">{{content}}</div>',
    'submitContainer' => '{{content}}'
]);
$form = $this->Form->create($genero);
$form .= $this->Form->input('id');
$form .= $this->Form->input('nome', ['required' => false, 'class' => 'form-control']);
$form .= $this->Form->submit('Gravar', array('class' => 'btn btn-success'));
$form .= $this->Html->link('Voltar', '/generos', array('class' => 'btn btn-secondary ml-3'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Alterar Gênero');
echo $form;

$this->assign('documentReady', '$(".form-error").addClass("is-invalid");');
