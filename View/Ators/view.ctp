<?php
$form = $this->Form->create('Ator');
$form .= $this->Html->div('form-row',
    $this->Form->input('Ator.nome', array(
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'disabled' => true
    )) .
    $this->Form->input('Ator.nascimento', array(
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'type' => 'text',
        'disabled' => true
    ))
);
$form .= $this->Form->input('Filme.Filme', array(
    'type' => 'select',
    'div' => array('class' => 'form-group'),
    'class' => 'form-control',
    'label' => array('text' => 'Selecione os Filmes'),
    'disabled' => true,
    'multiple' => true,
    'options' => $filmes
));
$form .= $this->Js->link('Voltar', '/ators', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Ator');
echo $form;
?>
