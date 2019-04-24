<?php
App::uses('AppController', 'Controller');

class AtorsController extends AppController {

    public $paginate = array(
        'fields' => array('Ator.id', 'Ator.nome', 'Ator.nascimento'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Ator.nome' => 'asc')    
    );

    public function index() {
/*
        $fields = array('Ator.id', 'Ator.nome', 'Ator.nascimento');
        $order = array('Ator.nome' => 'asc');
        $group = array();
        $conditions = array();
        $ators = $this->Ator->find('all', compact('fields', 'order', 'conditions'));
*/
        if ($this->request->is('post') && !empty($this->request->data['Ator']['nome'])) {
            $this->paginate['conditions']['Ator.nome LIKE'] = '%' .trim($this->request->data['Ator']['nome']) . '%';
        }
        $ators = $this->paginate();
        $this->set('ators', $ators);        
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Ator->create();
            if ($this->Ator->save($this->request->data)) {
                $this->Flash->set('Ator gravado com sucesso!');
                $this->redirect('/ators');
            }
        }
        $this->set('filmes', $this->Ator->Filme->find('list', array('fields' => array('Filme.id', 'Filme.nome'))));
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Ator->save($this->request->data)) {
                $this->Flash->set('Ator alterado com sucesso!');
                $this->redirect('/ators');
            }
        } else {
            $fields = array('Ator.id', 'Ator.nome', 'Ator.nascimento');
            $conditions = array('Ator.id' => $id);
            $ator = $this->Ator->find('first', compact('fields', 'conditions'));
            if (!empty($ator['Ator']['nascimento'])) {
                $ator['Ator']['nascimento'] = date('d/m/Y', strtotime($ator['Ator']['nascimento']));
            }
            $this->request->data = $ator;
        }
        $this->set('filmes', $this->Ator->Filme->find('list', array('fields' => array('Filme.id', 'Filme.nome'))));
    }

    public function view($id = null) {
        $fields = array('Ator.id', 'Ator.nome', 'Ator.nascimento');
        $conditions = array('Ator.id' => $id);
        $ator = $this->Ator->find('first', compact('fields', 'conditions'));
        if (!empty($ator['Ator']['nascimento'])) {
            $ator['Ator']['nascimento'] = date('d/m/Y', strtotime($ator['Ator']['nascimento']));
        }
        $this->request->data = $ator;
}

    public function delete($id) {
        $this->Ator->delete($id);
        $this->Flash->set('Ator excluído com sucesso!');
        $this->redirect('/ators');
    }

}
