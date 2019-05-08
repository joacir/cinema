<?php
$form = $this->Form->create('Filme');
$form .= $this->Html->div('form-row', 
    $this->Form->input('Filme.nome', array(
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'disabled' => true
    )) .
    $this->Form->input('Filme.idioma', array(
        'type' => 'select',
        'options' => array('Inglês' => 'Inglês', 'Português' => 'Português', 'Espanhol' => 'Espanhol', 'Francês' => 'Francês'),
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'disabled' => true
    ))
);
$form .= $this->Html->div('form-row', 
    $this->Form->input('Filme.duracao', array(
        'label' => array('text' => 'Duração'),
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'disabled' => true
    )) .
    $this->Form->input('Filme.ano', array(
        'type' => 'text', 
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'disabled' => true
    )) .
    $this->Form->input('Filme.genero_id', array(
        'type' => 'select', 
        'label' => array('text' => 'Gênero'),
        'options' => $generos,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'disabled' => true
    ))
);
$form .= $this->Form->input('Ator.Ator', array(
    'type' => 'select',
    'label' => array('text' => 'Selecione os Atores'),
    'multiple' => true, 
    'options' => $ators,
    'div' => array('class' => 'form-group'),
    'class' => 'form-control', 
    'disabled' => true
));
$form .= $this->Js->link('Voltar', '/filmes', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Filme');
echo $form;

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}