<?php
$this->Form->setTemplates([
    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
    'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
    'inputContainerError' => '<div class="form-group {{type}}{{required}}">{{content}}{{error}}</div>',
    'error' => '<div class="invalid-feedback">{{content}}</div>',
    'submitContainer' => '{{content}}'
]);

$form = $this->Form->create($critica);
$form .= $this->Html->div('form-row',
    $this->Html->div('col-md-6',
        $this->Form->input('nome', ['class' => 'form-control']) 
    ) .
    $this->Html->div('col-md-6',
        $this->Form->input('avaliacao', [
            'class' => 'form-control',
            'label' => 'Avaliação'
        ])
    )
);
$form .= $this->Html->div('form-row',
    $this->Html->div('col-md-6',
        $this->Form->input('data_avaliacao', [
            'type' => 'text',
            'class' => 'form-control',
            'label' => 'Data Avaliação'
        ]) 
    ) . 
    $this->Html->div('col-md-6',
        $this->Form->input('filme_id', [
            'type' => 'select', 
            'label' => 'Filme',
            'class' => 'form-control',
            'options' => $filmes
        ])
    )
);
$form .= $this->Form->submit('Gravar', array('class' => 'btn btn-success'));
$form .= $this->Html->link('Voltar', '/criticas', array('class' => 'btn btn-secondary ml-3'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Nova Crítica');
echo $form;

$this->assign('documentReady', '$(".form-error").addClass("is-invalid");');

