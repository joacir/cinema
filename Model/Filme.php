<?php
App::uses('AppModel', 'Model');

class Filme extends AppModel {

    public $actsAs = array(
        'Containable'
    );

    public $belongsTo = array(
        'Genero'
    );

    public $hasMany = array(
        'Critica'
    );

    public $hasAndBelongsToMany = array(
        'Ator'
    );

    public $validate = array(
        'nome' => array('rule' => 'notBlank', 'message' => 'Informe o nome, please'),
        'duracao' => array('rule' => 'notBlank', 'message' => 'Informe o duração, please')
    );

    public function delete($id = null, $cascade = true) {
        $this->id = $id;
        $deleted = $this->saveField('deleted', date('Y-m-d h:i:s'));

        return $deleted;
    }

}
?>