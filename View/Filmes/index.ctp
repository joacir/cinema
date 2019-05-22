<?php
$novoButton = $this->Js->link('Novo', '/filmes/add', array('class' => 'btn btn-success float-right', 'update' => '#content'));
$reportButton = $this->Html->link('Imprimir', '/filmes/report', array('class' => 'btn btn-secondary float-right mr-2', 'target' => '_blank'));

$filtro = $this->Form->create('Filme', array('class' => 'form-inline'));
$filtro .= $this->Form->input('Filme.nome_or_idioma', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));
$filtro .= $this->Js->submit('Filtrar', array('class' => 'btn btn-primary mb-2', 'div' => false, 'update' => '#content'));
$filtro .= $this->Form->end();

$filtroBar = $this->Html->div('row mb-3 mt-3', 
    $this->Html->div('col-md-6', $filtro) . 
    $this->Html->div('col-md-6', $novoButton . $reportButton)
);

$detalhe = array();
foreach ($filmes as $filme) {
    $editLink = $this->Js->link('Alterar', '/filmes/edit/' . $filme['Filme']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/filmes/delete/' . $filme['Filme']['id'], array('update' => '#content', 'confirm' => 'Tem certeza?'));
    $viewLink = $this->Js->link($filme['Filme']['nome'], '/filmes/view/' . $filme['Filme']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        $filme['Filme']['ano'],
        $filme['Genero']['nome'],
        $editLink . ' ' . $deleteLink
    );
}

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

$titulos = array('Nome', 'Ano', 'Gênero',  '');
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));
$body = $this->Html->tableCells($detalhe);

echo $this->Html->tag('h1', 'Filmes');
echo $filtroBar;
echo $this->Html->tag('table', $header . $body, array('class' => 'table'));
echo $paginateBar;

$this->Js->buffer('$(".nav-item").removeClass("active");');
$this->Js->buffer('$(".nav-item a[href$=\'filmes\']").addClass("active");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

