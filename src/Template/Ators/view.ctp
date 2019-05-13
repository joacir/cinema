<?php
$form = $this->Form->create($ator);
$this->Form->setTemplates([
    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
    'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
]);
$form .= $this->Html->div('form-row',
    $this->Html->div('col-md-6',
        $this->Form->input('nome', array(
            'disabled' => true,
            'class' => 'form-control', 
        ))
    ) .
    $this->Html->div('col-md-6',
        $this->Form->input('nascimento', array(
            'disabled' => true,
            'class' => 'form-control',
            'type' => 'text',
        ))
    )
);
$form .= $this->Form->input('filmes._ids', array(
    'type' => 'select',
    'disabled' => true,
    'class' => 'form-control',
    'label' => array('text' => 'Selecione os Filmes'),
    'multiple' => true,
    'options' => $filmes
));
$form .= $this->Html->link('Voltar', '/ators', array('class' => 'btn btn-secondary'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Ator');
echo $form;
?>
