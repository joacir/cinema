<?php
$this->request->data['Critica']['data_avaliacao'] = date('d/m/Y', strtotime($this->request->data['Critica']['data_avaliacao']));
$form = $this->Form->create('Critica');
$form .= $this->Html->div('form-row',
    $this->Form->input('Critica.nome', array(
        'disabled' => true,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
    )) .
    $this->Form->input('Critica.avaliacao', array(
        'div' => array('class' => 'form-group col-md-6'),
        'label' => array('text' => 'Avaliação'),
        'class' => 'form-control', 
        'disabled' => true    
    ))
);
$form .= $this->Html->div('form-row',
    $this->Form->input('Critica.data_avaliacao', array(
        'type' => 'text',
        'label' => array('text' => 'Data Avaliação'),
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'disabled' => true
    )) .
    $this->Form->input('Filme.nome', array(
        'type' => 'text', 
        'label' => array('text' => 'Filme'),
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'disabled' => true,
    ))
);
$form .= $this->Js->link('Voltar', '/criticas', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Crítica');
echo $form;

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
