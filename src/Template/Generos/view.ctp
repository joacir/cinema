<?php
$this->Form->setTemplates([
    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
    'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
]);
$form = $this->Form->create($genero);
$form .= $this->Form->input('nome', ['disabled' => true, 'class' => 'form-control']);
$form .= $this->Html->link('Voltar', '/generos', array('class' => 'btn btn-secondary'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Gênero');
echo $form;