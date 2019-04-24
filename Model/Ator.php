<?php
App::uses('AppModel', 'Model');

class Ator extends AppModel {

    public $hasAndBelongsToMany = array(
        'Filme'
    );

    public $validate = array(
        'nome' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Informe o nome'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe um nome com mais de 2 dígitos')
        ),
        'nascimento' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Informe o nascimento'),
            'date' => array('rule' => array('date', 'dmy'), 'message' => 'Nascimento inválido')
        )
    );

    public function beforeSave($options = array()) {
        $continue = true;
        if (!empty($this->data['Ator']['nascimento'])) {
            $data = str_replace('/', '-', $this->data['Ator']['nascimento']);
            $this->data['Ator']['nascimento'] = date('Y-m-d', strtotime($data));
        }

        return $continue;
    }

}
?>