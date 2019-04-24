<?php
$novoButton = $this->Html->link('Novo', '/ators/add');

$filtro = $this->Form->create('Ator');
$filtro .= $this->Form->input('Ator.nome', array('required' => false));
$filtro .= $this->Form->end('Filtrar');

$detalhe = array();
foreach ($ators as $ator) {
    $editLink = $this->Html->link('Alterar', '/ators/edit/' . $ator['Ator']['id']);
    $deleteLink = $this->Html->link('Excluir', '/ators/delete/' . $ator['Ator']['id']);
    $viewLink = $this->Html->link($ator['Ator']['nome'], '/ators/view/' . $ator['Ator']['id']);
    $detalhe[] = array(
        $viewLink, 
        date('d/m/Y', strtotime($ator['Ator']['nascimento'])),
        $editLink . ' ' . $deleteLink
    );
}
$nomeSort = $this->Paginator->sort('Ator.nome', 'Nome');
$nascimentoSort = $this->Paginator->sort('Ator.nascimento', 'Nascimento');
$titulos = array($nomeSort, $nascimentoSort, 'Acoes');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);

$paginate = '';
$paginate .= $this->Paginator->first() . '    ';
$paginate .= $this->Paginator->prev() . '    ';
$paginate .= $this->Paginator->next() . '    ';
$paginate .= $this->Paginator->last() . '    ';
$paginate .= $this->Paginator->link('5 por pagina', array('controller' => 'ators', 'action' => 'index', 'limit' => 5)) . '    ';
$paginate .= $this->Paginator->link('10 por pagina', array('controller' => 'ators', 'action' => 'index', 'limit' => 10)) . '    ';
$paginate = $this->Html->para('', $paginate);
$paginate .= $this->Html->para('', $this->Paginator->counter(
    'Page {:page} of {:pages}, showing {:current} records out of
     {:count} total, starting on record {:start}, ending on {:end}'
));

echo $this->Html->tag('h1', 'Atores');
echo $novoButton;
echo $filtro;
echo $this->Html->tag('table', $header . $body);
echo $paginate;
?>
