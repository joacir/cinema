<?php
$form = $this->Form->create('Critica');
$form .= $this->Html->div('form-row',
    $this->Form->input('Critica.nome', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Critica.avaliacao', array(
        'div' => array('class' => 'form-group col-md-6'),
        'label' => array('text' => 'Avaliação'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))    
    ))
);
$form .= $this->Html->div('form-row',
    $this->Form->input('Critica.data_avaliacao', array(
        'type' => 'text',
        'label' => array('text' => 'Data Avaliação'),
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Critica.filme_id', array(
        'type' => 'select', 
        'label' => array('text' => 'Selecione o Filme'),
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
        'options' => $filmes
    ))
);
$form .= $this->Js->submit('Gravar', array('div' => false, 'class' => 'btn btn-success', 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/criticas', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Novo Crítica');
echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

