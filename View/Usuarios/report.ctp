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
                array('cell' => array('fieldName' => 'Usuario.nome')),
            ))
        ),
        'sumary' => array(
            array('cell' => array('text' => 'Total de Usuários ==> [RECORD_COUNT]', 'fontStyle' => 'I', 'lineHeight' => 20)),
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
    'records' => $usuarios,
    'header' => array('title' => 'Usuários Cadastrados')
);

echo $this->Report->create($settings);