<?php
$this->Form->setTemplates([
    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
    'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
]);

$form = $this->Form->create($filme);
$form .= $this->Html->div('form-row',
    $this->Html->div('col-md-6',
        $this->Form->input('nome', ['disabled' => true, 'class' => 'form-control'])
    ) .
    $this->Html->div('col-md-6',
        $this->Form->input('idioma', [
            'type' => 'select',
            'disabled' => true,
            'class' => 'form-control',
            'options' => ['Inglês' => 'Inglês', 'Português' => 'Português', 'Espanhol' => 'Espanhol', 'Francês' => 'Francês']    
        ])
    )
);
$form .= $this->Html->div('form-row',
    $this->Html->div('col-md-4',
        $this->Form->input('duracao', [
            'label' => 'Duração',
            'disabled' => true,
            'class' => 'form-control'
        ])
    ) .
    $this->Html->div('col-md-4',
        $this->Form->input('ano', ['type' => 'text', 'class' => 'form-control', 'disabled' => true])
    ) .
    $this->Html->div('col-md-4',       
        $this->Form->input('genero_id', [
            'type' => 'select', 
            'disabled' => true,
            'label' => 'Gênero',
            'class' => 'form-control',
            'options' => $generos
        ])
    )
);
$form .= $this->Form->input('ators._ids', [
    'type' => 'select',
    'multiple' => true, 
    'disabled' => true,
    'label' => 'Selecione os Atores',
    'class' => 'form-control',
    'options' => $ators
]);
$form .= $this->Html->link('Voltar', '/filmes', array('class' => 'btn btn-secondary'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Filme');
echo $form;
