<?php
$form = $this->element('formCreate', ['options' => ['class' => 'form-signin']]);
$form .= $this->Html->tag('h1', 'Login do Usuário', array('class' => 'h3 mb-3 font-weight-normal'));
$form .= $this->Form->control('login', [
    'div' => false,
    'label' => ['class' => 'sr-only'],
    'placeholder' => 'Login'
]);
$form .= $this->Form->control('senha', [
    'type' => 'password',
    'label' => ['class' => 'sr-only'],
    'div' => false,
    'placeholder' => 'Senha'
]);
$form .= $this->Form->submit('Entrar', ['class' => 'btn btn-success btn-lg btn-block mb-3']);
$form .= $this->Flash->render('danger'); 
$form .= $this->Flash->render('warning'); 
$form .= $this->Form->end();

echo $form;

$this->Js->buffer('$(".form-error input").addClass("is-invalid");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
