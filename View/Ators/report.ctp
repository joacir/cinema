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
                array('cell' => array('text' => 'Nascimento', 'lineWidth' => 30)),
            ))            
        ),
        'body' => array(
            array('line' => array(
                'border' => 1,
                array('cell' => array('fieldName' => 'Ator.nome')),
                array('cell' => array('fieldName' => 'Ator.nascimento', 'lineWidth' => 30, 'date' => 'd/m/Y')),
            ))
        ),
        'sumary' => array(
            array('cell' => array('text' => 'Total de Atores ==> [RECORD_COUNT]', 'fontStyle' => 'I', 'lineHeight' => 20)),
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
    'records' => $ators,
    'header' => array('title' => 'Atores Cadastrados')
);

echo $this->Report->create($settings);