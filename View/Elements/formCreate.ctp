<?php
$inputDefaults = array(
    'class' => 'form-control',
    'required' => false,
    'div' => array('class' => 'form-group'),
    'error' => array('attributes' => array('class' => 'invalid-feedback')),
    'type' => 'text'
);
if ($this->request->params['action'] == 'view') {
    $inputDefaults['disabled'] = true;
}
$formCreate = $this->Form->create(false, array('inputDefaults' => $inputDefaults));

echo $formCreate;