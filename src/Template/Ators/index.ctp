<?php
$novoButton = $this->Html->link('Novo', '/ators/add', ['class' => 'btn btn-success float-right']);

$filtro = $this->Form->create($ator, ['class' => 'form-inline']);
$filtro .= $this->Form->input('nome', [
    'required' => false,
    'label' => ['text' => 'Nome', 'class' => 'sr-only'],
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
]);
$filtro .= $this->Form->button('Filtrar', ['type' => 'submit', 'class' => 'btn btn-primary mb-2']);
$filtro .= $this->Form->end();

$filtroBar = $this->Html->div('row mb-3 mt-3', 
    $this->Html->div('col-md-6', $filtro) . 
    $this->Html->div('col-md-6', $novoButton)
);
$detalhe = array();
foreach ($ators as $ator) {
    $editLink = $this->Html->link('Alterar', '/ators/edit/' . $ator['id']);
    $deleteLink = $this->Html->link('Excluir', '/ators/delete/' . $ator['id']);
    $viewLink = $this->Html->link($ator['nome'], '/ators/view/' . $ator['id']);
    $detalhe[] = array(
        $viewLink, 
        $ator['nascimento'],
        $editLink . ' ' . $deleteLink
    );
}
$nomeSort = $this->Paginator->sort('nome', 'Nome');
$nascimentoSort = $this->Paginator->sort('nascimento', 'Nascimento');
$titulos = [$nomeSort, $nascimentoSort, ''];
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

echo $this->Html->tag('h1', 'Atores');
echo $filtroBar;
echo $this->Html->tag('table', $header . $body, ['class' => 'table']);
echo $paginateBar;
