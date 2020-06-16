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
                array('cell' => array('text' => 'Avaliação', 'lineWidth' => 30)),
            ))            
        ),
        'body' => array(
            array('line' => array(
                'border' => 1,
                array('cell' => array('fieldName' => 'Critica.nome')),
                array('cell' => array('fieldName' => 'Critica.avaliacao', 'lineWidth' => 30, 'align' => 'R')),
            ))
        ),
        'sumary' => array(
            array('cell' => array('text' => 'Total de Críticas ==> [RECORD_COUNT]', 'fontStyle' => 'I', 'lineHeight' => 20)),
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
    'records' => $criticas,
    'header' => array('title' => 'Críticas Cadastradas')
);

echo $this->Report->create($settings);