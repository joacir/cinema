<?php
$this->extend('/Common/form');

$this->assign('title', 'Novo Gênero');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->control('nome');

$this->assign('formFields', $formFields);