<?php
$path = ROOT . DS . 'templates' . DS . 'Common' . DS;
$settings = array(
    'templateFile' => array(
        'config' => $path . 'report-config.xml', /*comum */
        'header' => $path . 'report-header.xml', /* comum */
        'columnTitles' => $path . 'report-ators-column-titles.xml', /* muda */
        'body' => $path . 'report-ators-body.xml', /* muda */
        'sumary' => $path . 'report-sumary.xml', /* comum */
        'footer' => $path . 'report-footer.xml' /* comum */
    ),
    'records' => $ators,
    'header' => array('title' => 'Atores Cadastrados')
);

echo $this->Report->create($settings);