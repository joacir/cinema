<?php
$this->extend('/Common/form');

$this->assign('title', 'Alterar Crítica');

$this->request->data['Critica']['data_avaliacao'] = date('d/m/Y', strtotime($this->request->data['Critica']['data_avaliacao']));
$formFields = $this->element('formCreate');
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Critica.nome', array(
        'div' => array('class' => 'form-group col-md-6'),
    )) .
    $this->Form->input('Critica.avaliacao', array(
        'div' => array('class' => 'form-group col-md-6'),
        'label' => array('text' => 'Avaliação'),
    ))
);
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Critica.data_avaliacao', array(
        'label' => array('text' => 'Data Avaliação'),
        'div' => array('class' => 'form-group col-md-6'),
    )) .
    $this->Form->input('Filme.nome', array(
        'label' => array('text' => 'Filme'),
        'div' => array('class' => 'form-group col-md-6'),
    ))
);

$this->assign('formFields', $formFields);
