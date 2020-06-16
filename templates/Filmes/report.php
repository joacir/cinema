<?php
$settings = array(
    'template' => array(
        'config' => array(
            'margin' => 10,
        ),
        'header' => array(
            array('line' => array(
                array('cell' => array('fieldName' => 'Header.title', 'align' => 'C', 'fontSizePt' => 18, 'lineHeight' => 20)))
            )
        ),
        'columnTitles' => array(
            array('line' => array(                                
                'border' => 1,
                'fontStyle' => 'B',
                array('cell' => array('text' => 'Nome')),
                array('cell' => array('text' => 'Ano', 'lineWidth' => 20)),
                array('cell' => array('text' => 'Gênero', 'lineWidth' => 40))
            ))            
        ),
        'body' => array(
            array('line' => array(
                'border' => 1,
                array('cell' => array('fieldName' => 'Filme.nome')),
                array('cell' => array('fieldName' => 'Filme.ano', 'lineWidth' => 20)),
                array('cell' => array('fieldName' => 'Genero.nome', 'lineWidth' => 40)),
            ))
        ),
        'sumary' => array(
            array('cell' => array('text' => 'Total de Filmes ==> [RECORD_COUNT]', 'fontStyle' => 'I', 'lineHeight' => 20)),
        ),
        'footer' => array(
            array('line' => array(                                
                'border' => 'T',
                'fontSizePt' => 6,
                array('cell' => 'Impresso em [DATE]'),
                array('cell' => array('text' => 'Página: [PAGE]/[PAGES]', 'align' => 'R')),
            ))         
        )  
    ),
    'records' => $filmes,
    'header' => array('title' => 'Filmes Cadastrados')
);

echo $this->Report->create($settings);