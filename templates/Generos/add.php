<?php
$this->extend('/Common/form');

$this->assign('title', 'Novo Gênero');

$formFields = $this->element('formCreate', ['entity' => $genero]);
$formFields .= $this->Form->control('nome');

$this->assign('formFields', $formFields);