<?php
$this->extend('/Common/form');

$this->assign('title', 'Alterar Usuário');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Usuario.id');
$formFields .= $this->Form->input('Usuario.nome');
$formFields .=$this->Html->div('row',
    $this->Form->input('Usuario.login', array(
        'div' => array('class' => 'form-group col-md-6')
    )) .
    $this->Form->input('Usuario.aro_parent_id', array(
        'div' => array('class' => 'form-group col-md-6'),
        'label' => array('text' => 'Permissão'),
        'type' => 'select',
        'options' => $aros,
    ))
);

$this->assign('formFields', $formFields);
