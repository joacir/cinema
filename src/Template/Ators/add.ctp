<?php
$form = $this->Form->create($ator);
$this->Form->setTemplates([
    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
    'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
    'inputContainerError' => '<div class="form-group {{type}}{{required}}">{{content}}{{error}}</div>',
    'error' => '<div class="invalid-feedback">{{content}}</div>',
    'submitContainer' => '{{content}}'
]);
$form .= $this->Html->div('form-row',
    $this->Html->div('col-md-6',
        $this->Form->input('nome', array(
            'required' => false,
            'class' => 'form-control', 
        ))
    ) .
    $this->Html->div('col-md-6',
        $this->Form->input('nascimento', array(
            'required' => false,
            'class' => 'form-control',
            'type' => 'text',
        ))
    )
);
$form .= $this->Form->input('filmes._ids', array(
    'type' => 'select',
    'class' => 'form-control',
    'label' => array('text' => 'Selecione os Filmes'),
    'multiple' => true,
    'options' => $filmes
));
$form .= $this->Form->submit('Gravar', array('type' => 'submit', 'class' => 'btn btn-success'));
$form .= $this->Html->link('Voltar', '/ators', array('class' => 'btn btn-secondary ml-3'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Novo Ator');
echo $form;

$this->assign('documentReady', '$(".form-error").addClass("is-invalid");');
