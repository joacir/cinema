<?php
$novoButton = $this->Html->link(__('Novo'), ['action' => 'add'], ['class' => 'btn btn-success float-right', 'update' => '#content']);
$reportButton = $this->Html->link(__('Imprimir'), ['action' => 'report'], ['class' => 'btn btn-secondary float-right mr-2', 'target' => '_blank']);

$filtro = $this->element('formCreate', ['options' => ['class' => 'form-inline']]);
$filtro .= $this->fetch('searchFields'); 
$filtro .= $this->Form->submit(__('Filtrar'), ['class' => 'btn btn-primary mb-2', 'update' => '#content']);
$filtro .= $this->Form->end();

$filtroBar = $this->Html->div('row mb-3 mt-3', 
    $this->Html->div('col-md-6', $filtro) . 
    $this->Html->div('col-md-6', $novoButton . $reportButton)
);

$tableHeaders = $this->fetch('tableHeaders'); 
$header = $this->Html->tag('thead', $tableHeaders, ['class' => 'thead-light']);
$tableCells = $this->fetch('tableCells'); 
$table = $this->Html->tag('table', $header . $tableCells, ['class' => 'table']);

$this->Paginator->setTemplates([
    'first' => '<a href="{{url}}" class="page-link" update="#content">{{text}}</a>',
	'last' => '<a href="{{url}}" class="page-link" update="#content">{{text}}</a>',
    'nextActive' => '<a rel="next" href="{{url}}" class="page-link" update="#content">{{text}}</a>',
	'nextDisabled' => '<a href="" onclick="return false;" class="page-link disabled">{{text}}</a>',
	'prevActive' => '<a rel="prev" href="{{url}}" class="page-link" update="#content">{{text}}</a>',
    'prevDisabled' => '<a href="" onclick="return false;" class="page-link disabled">{{text}}</a>'
]);
$links = [
    $this->Paginator->first(__('<< Primeira')),
    $this->Paginator->prev(__('< Anterior')),
    $this->Paginator->next(__('Próxima >')),
    $this->Paginator->last(__('Última >>'))
];
$paginate = $this->Html->nestedList($links, ['class' => 'pagination'], ['class' => 'page-item']);
$paginate = $this->Html->tag('nav', $paginate);
$paginateCount = $this->Paginator->counter(
    '{{page}} de {{pages}}, mostrando {{current}} registros de {{count}}, começando em {{start}} até {{end}}'
);
$paginateBar = $this->Html->div('row', 
    $this->Html->div('col-md-6', $paginate) . 
    $this->Html->div('col-md-6 text-right', $paginateCount)
);

echo $this->Flash->render('success'); 
echo $this->Flash->render('warning'); 
echo $this->Flash->render('danger'); 
echo $this->Html->tag('h1', $this->fetch('title')); 
echo $filtroBar;
echo $table;
echo $paginateBar;

$controllerName = \Cake\Utility\Inflector::underscore($this->request->getParam('controller'));
$this->Js->buffer("createRequestGets('#content a');");
$this->Js->buffer("createRequestPosts('#content input[type=submit]');");    
$this->Js->buffer('$(".nav-item").removeClass("active");');
$this->Js->buffer('$(".nav-item a[href$=\'' . $controllerName . '\']").addClass("active");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
