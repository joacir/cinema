<?php
App::uses('AppController', 'Controller');

class AtorsController extends AppController {

    public $paginate = array(
        'fields' => array('Ator.id', 'Ator.nome', 'Ator.nascimento'),
        'conditions' => array(),
        'limit' => 10,        
        'order' => array('Ator.nome' => 'asc')    
    );

    public function setPaginateConditions() {
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->data['Ator']['nome'];
            $this->Session->write('Ator.nome', $nome);
        } else {
            $nome = $this->Session->read('Ator.nome');
            $this->request->data('Ator.nome', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Ator.nome LIKE'] = '%' . trim($nome) . '%';
        }
    }

    public function add() {
        parent::add();
        $this->setFilmes();
    }

    public function edit($id = null) {
        parent::edit($id);
        $this->setFilmes();
    }

    public function getEditData($id) {
        $fields = array('Ator.id', 'Ator.nome', 'Ator.nascimento');
        $conditions = array('Ator.id' => $id);
        $ator = $this->Ator->find('first', compact('fields', 'conditions'));
        if (!empty($ator['Ator']['nascimento'])) {
            $ator['Ator']['nascimento'] = date('d/m/Y', strtotime($ator['Ator']['nascimento']));
        }
        return $ator;
    }

    public function view($id = null) {
        parent::view($id);
        $this->setFilmes();
    }

}
