<?php
$controllerName = $this->request->params['controller'];
$novoButton = $this->Js->link('Novo', '/' . $controllerName . '/add', array('class' => 'btn btn-success float-right', 'update' => '#content'));
$reportButton = $this->Html->link('Imprimir', '/' . $controllerName . '/report', array('class' => 'btn btn-secondary float-right mr-2', 'target' => '_blank'));

$filtro = $this->Form->create(false, array('class' => 'form-inline'));
$filtro .= $this->fetch('searchFields'); 
$filtro .= $this->Js->submit('Filtrar', array('class' => 'btn btn-primary mb-2', 'div' => false, 'update' => '#content'));
$filtro .= $this->Form->end();

$filtroBar = $this->Html->div('row mb-3 mt-3', 
    $this->Html->div('col-md-6', $filtro) . 
    $this->Html->div('col-md-6', $novoButton . $reportButton)
);

$tableHeaders = $this->fetch('tableHeaders'); 
$header = $this->Html->tag('thead', $tableHeaders, array('class' => 'thead-light'));
$tableCells = $this->fetch('tableCells'); 
$table = $this->Html->tag('table', $header . $tableCells, array('class' => 'table'));

$this->Paginator->options(array('update' => '#content'));
$links = array(
    $this->Paginator->first('Primeira', array('class' => 'page-link')),
    $this->Paginator->prev('Anterior', array('class' => 'page-link')),
    $this->Paginator->next('Próxima', array('class' => 'page-link')),
    $this->Paginator->last('Última', array('class' => 'page-link'))
);
$paginate = $this->Html->nestedList($links, array('class' => 'pagination'), array('class' => 'page-item'));
$paginate = $this->Html->tag('nav', $paginate);
$paginateCount = $this->Paginator->counter(
    '{:page} de {:pages}, mostrando {:current} registros de {:count}, começando em {:start} até {:end}'
);
$paginateBar = $this->Html->div('row', 
    $this->Html->div('col-md-6', $paginate) . 
    $this->Html->div('col-md-6', $paginateCount)
);

echo $this->Flash->render('warning'); 
echo $this->Flash->render('success'); 

echo $this->Html->tag('h1', $this->fetch('title')); 
echo $filtroBar;
echo $table;
echo $paginateBar;

$this->Js->buffer('$(".nav-item").removeClass("active");');
$this->Js->buffer('$(".nav-item a[href$=\'' . $controllerName . '\']").addClass("active");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
