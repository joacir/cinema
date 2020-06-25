<?php
$path = ROOT . DS . 'templates' . DS . 'Common' . DS;
$settings = array(
    'templateFile' => array(
        'config' => $path . 'report-config.xml', /*comum */
        'header' => $path . 'report-header.xml', /* comum */
        'columnTitles' => $path . 'report-generos-column-titles.xml', /* muda */
        'body' => $path . 'report-generos-body.xml', /* muda */
        'sumary' => $path . 'report-sumary.xml', /* comum */
        'footer' => $path . 'report-footer.xml' /* comum */
    ),
    'records' => $generos,
    'header' => array('title' => 'Gêneros Cadastrados')
);

echo $this->Report->create($settings);