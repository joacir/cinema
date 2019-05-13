<?php
$novoButton = $this->Html->link('Novo', '/generos/add', ['class' => 'btn btn-success float-right']);

$filtro = $this->Form->create($genero, ['class' => 'form-inline']);
$filtro .= $this->Form->input('nome', [
    'required' => false,
    'label' => ['text' => 'Nome', 'class' => 'sr-only'],
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
]);
$filtro .= $this->Form->submit('Filtrar', ['class' => 'btn btn-primary mb-2']);
$filtro .= $this->Form->end();

$filtroBar = $this->Html->div('row mb-3 mt-3', 
    $this->Html->div('col-md-6', $filtro) . 
    $this->Html->div('col-md-6', $novoButton)
);

$detalhe = [];
foreach ($generos as $genero) {
    $editLink = $this->Html->link('Alterar', '/generos/edit/' . $genero['id']);
    $deleteLink = $this->Html->link('Excluir', '/generos/delete/' . $genero['id']);
    $viewLink = $this->Html->link($genero['nome'], '/generos/view/' . $genero['id']);
    $detalhe[] = array(
        $viewLink, 
        $editLink . ' ' . $deleteLink
    );
}
$titulos = array('Nome', '');
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), ['class' => 'thead-light']);
$body = $this->Html->tableCells($detalhe);

$template = $this->Paginator->setTemplates([
    'nextActive' => '<li class="page-item next"><a rel="next" class="page-link" href="{{url}}">{{text}}</a></li>',
	'nextDisabled' => '<li class="page-item next disabled"><a class="page-link" href="" onclick="return false;">{{text}}</a></li>',
	'prevActive' => '<li class="page-item prev"><a class="page-link" rel="prev" href="{{url}}">{{text}}</a></li>',
	'prevDisabled' => '<li class="page-item prev disabled"><a class="page-link" href="" onclick="return false;">{{text}}</a></li>',
	'first' => '<li class="page-item first"><a class="page-link" rel="prev" href="{{url}}">{{text}}</a></li>',
	'last' => '<li class="page-item last"><a class="page-link" rel="prev" href="{{url}}">{{text}}</a></li>',
]);
$links = array(
    $this->Paginator->first('Primeira'),
    $this->Paginator->prev('Anterior'),
    $this->Paginator->next('Próxima'),
    $this->Paginator->last('Última')
);
$paginate = $this->Html->nestedList($links, ['class' => 'pagination'], ['class' => 'page-item']);
$paginate = $this->Html->tag('nav', $paginate);
$paginateCount = $this->Paginator->counter(
    '{{page}} de {{pages}}, mostrando {{current}} registros de {{count}}, começando em {{start}} até {{end}}'
);
$paginateBar = $this->Html->div('row', 
    $this->Html->div('col-md-6', $paginate) . 
    $this->Html->div('col-md-6', $paginateCount)
);

echo $this->Html->tag('h1', 'Gêneros');
echo $filtroBar;
echo $this->Html->tag('table', $header . $body, ['class' => 'table']);
echo $paginateBar;
