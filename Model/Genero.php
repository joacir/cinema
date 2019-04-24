<?php
App::uses('AppModel', 'Model');

class Genero extends AppModel {

    public $validate = array(
        'nome' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Informe o nome'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe um nome com mais de 2 dígitos'),
            'isUnique' => array('rule' => 'isUnique', 'message' => 'Nome já existe'),
        )
    );

}
?>