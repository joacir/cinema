<?php
$this->extend('/Common/form');

$this->assign('title', 'Visualizar Usuário');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->input('Usuario.nome');
$formFields .=$this->Html->div('row',
    $this->Form->input('Usuario.login', array(
        'div' => array('class' => 'form-group col-md-6')
    )) .
    $this->Form->input('Usuario.aro_parent_id', array(
        'div' => array('class' => 'form-group col-md-6'),
        'type' => 'select',
        'label' => array('text' => 'Permissão'),
        'options' => $aros,
    ))
);

$this->assign('formFields', $formFields);
