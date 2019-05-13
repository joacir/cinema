<?php
$this->Form->setTemplates([
    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
    'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
    'inputContainerError' => '<div class="form-group {{type}}{{required}}">{{content}}{{error}}</div>',
    'error' => '<div class="invalid-feedback">{{content}}</div>',
    'submitContainer' => '{{content}}'
]);

$form = $this->Form->create($filme);
$form .= $this->Form->input('id');
$form .= $this->Html->div('form-row',
    $this->Html->div('col-md-6',
        $this->Form->input('nome', ['required' => false, 'class' => 'form-control'])
    ) .
    $this->Html->div('col-md-6',
        $this->Form->input('idioma', [
            'type' => 'select',
            'class' => 'form-control',
            'options' => ['Inglês' => 'Inglês', 'Português' => 'Português', 'Espanhol' => 'Espanhol', 'Francês' => 'Francês']    
        ])
    )
);
$form .= $this->Html->div('form-row',
    $this->Html->div('col-md-4',
        $this->Form->input('duracao', [
            'label' => 'Duração',
            'class' => 'form-control'
        ])
    ) .
    $this->Html->div('col-md-4',
        $this->Form->input('ano', ['type' => 'text', 'maxlength' => 4, 'class' => 'form-control'])
    ) .
    $this->Html->div('col-md-4',       
        $this->Form->input('genero_id', [
            'type' => 'select', 
            'label' => 'Gênero',
            'class' => 'form-control',
            'options' => $generos
        ])
    )
);
$form .= $this->Form->input('ators._ids', [
    'type' => 'select',
    'multiple' => true, 
    'label' => 'Selecione os Atores',
    'class' => 'form-control',
    'options' => $ators
]);
$form .= $this->Form->submit('Gravar', array('class' => 'btn btn-success'));
$form .= $this->Html->link('Voltar', '/filmes', array('class' => 'btn btn-secondary ml-3'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Alterar Filme');
echo $form;

$this->assign('documentReady', '$(".form-error").addClass("is-invalid");');
