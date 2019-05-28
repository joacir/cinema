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
            ))            
        ),
        'body' => array(
            array('line' => array(
                'border' => 1,
                array('cell' => array('fieldName' => 'Genero.nome')),
            ))
        ),
        'sumary' => array(
            array('cell' => array('text' => 'Total de Gêneros ==> [RECORD_COUNT]', 'fontStyle' => 'I', 'lineHeight' => 20)),
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
    'records' => $generos,
    'header' => array('title' => 'Gêneros Cadastrados')
);

echo $this->Report->create($settings);