<?php
$actionName = $this->request->getParam('action');
$form = $this->fetch('formFields');
if ($actionName != 'view') {
    $form .= $this->Form->submit('Gravar', ['class' => 'btn btn-success mr-3', 'update' => '#content']);
}
$form .= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'btn btn-secondary', 'update' => '#content']);
$form .= $this->Form->end();

echo $this->Html->tag('h1', $this->fetch('title'));
echo $form;

$this->Js->buffer('$(".form-error input").addClass("is-invalid");');
$this->Js->buffer("createRequestGets('#content a');");
$this->Js->buffer("createRequestPosts('#content input[type=submit]');");    
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
