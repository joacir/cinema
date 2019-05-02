<?php
$novoButton = $this->Html->link('Novo', '/filmes/add');

$filtro = $this->Form->create('Filme');
$filtro .= $this->Form->input('Filme.nome_or_idioma', array('required' => false));
$filtro .= $this->Form->end('Filtrar');

$detalhe = array();
foreach ($filmes as $filme) {
    $editLink = $this->Html->link('Alterar', '/filmes/edit/' . $filme['Filme']['id']);
    $deleteLink = $this->Html->link('Excluir', '/filmes/delete/' . $filme['Filme']['id']);
    $viewLink = $this->Html->link($filme['Filme']['nome'], '/filmes/view/' . $filme['Filme']['id']);
    $detalhe[] = array(
        $viewLink, 
        $filme['Filme']['ano'],
        $filme['Genero']['nome'],
        $editLink . ' ' . $deleteLink
    );
}

$titulos = array('Nome', 'Ano', 'Gênero',  '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);

$paginate = '';
$paginate .= $this->Paginator->first() . '    ';
$paginate .= $this->Paginator->prev() . '    ';
$paginate .= $this->Paginator->next() . '    ';
$paginate .= $this->Paginator->last() . '    ';
$paginate .= $this->Paginator->link('5 por pagina', array('controller' => 'filmes', 'action' => 'index', 'limit' => 5)) . '    ';
$paginate .= $this->Paginator->link('10 por pagina', array('controller' => 'filmes', 'action' => 'index', 'limit' => 10)) . '    ';
$paginate = $this->Html->para('', $paginate);
$paginate .= $this->Html->para('', $this->Paginator->counter(
    'Page {:page} of {:pages}, showing {:current} records out of
     {:count} total, starting on record {:start}, ending on {:end}'
));

echo $this->Html->tag('h1', 'Filmes');
echo $novoButton;
echo $filtro;
echo $this->Html->tag('table', $header . $body);
echo $paginate;
?>
