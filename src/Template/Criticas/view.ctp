<?php
$this->Form->setTemplates([
    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
    'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
]);

$form = $this->Form->create($critica);
$form .= $this->Html->div('form-row',
    $this->Html->div('col-md-6',
        $this->Form->input('nome', ['class' => 'form-control', 'disabled' => true]) 
    ) .
    $this->Html->div('col-md-6',
        $this->Form->input('avaliacao', [
            'class' => 'form-control',
            'label' => 'Avaliação',
            'disabled' => true
        ])
    )
);
$form .= $this->Html->div('form-row',
    $this->Html->div('col-md-6',
        $this->Form->input('data_avaliacao', [
            'type' => 'text',
            'class' => 'form-control',
            'label' => 'Data Avaliação',
            'disabled' => true
        ]) 
    ) . 
    $this->Html->div('col-md-6',
        $this->Form->input('filme.nome', [
            'type' => 'text', 
            'label' => 'Filme',
            'class' => 'form-control',
            'disabled' => true
        ])
    )
);
$form .= $this->Html->link('Voltar', '/criticas', array('class' => 'btn btn-secondary'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Crítica');
echo $form;
?>
