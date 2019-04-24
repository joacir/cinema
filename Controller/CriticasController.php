<?php
App::uses('AppController', 'Controller');

class CriticasController extends AppController {

    public function index() {
        $fields = array('Critica.id', 'Critica.nome', 'Critica.avaliacao', 'Critica.data_avaliacao', 'Filme.nome');
        $order = array('Critica.nome' => 'asc');
        $group = array();
        $conditions = array();
        $criticas = $this->Critica->find('all', compact('fields', 'order', 'conditions'));

        $this->set('criticas', $criticas);        
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Critica->create();
            if ($this->Critica->save($this->request->data)) {
                $this->Flash->set('Crítica gravada com sucesso!');
                $this->redirect('/criticas');
            }
        }
        $this->set('filmes', $this->Critica->Filme->find('list', array('fields' => array('Filme.id', 'Filme.nome'))));
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Critica->save($this->request->data)) {
                $this->Flash->set('Crítica alterada com sucesso!');
                $this->redirect('/criticas');
            }
        } else {
            $fields = array('Critica.id', 'Critica.nome', 'Critica.avaliacao', 'Critica.data_avaliacao', 'Critica.filme_id');
            $conditions = array('Critica.id' => $id);
            $critica = $this->Critica->find('first', compact('fields', 'conditions'));
            if (!empty($critica['Critica']['data_validacao'])) {
                $critica['Critica']['data_validacao'] = date('d/m/Y', strtotime($critica['Critica']['data_validacao']));
            }
            $this->request->data = $critica;
        }
        $this->set('filmes', $this->Critica->Filme->find('list', array('fields' => array('Filme.id', 'Filme.nome'))));
    }

    public function view($id = null) {
        $fields = array('Critica.id', 'Critica.nome', 'Critica.avaliacao', 'Critica.data_avaliacao', 'Filme.nome');
        $conditions = array('Critica.id' => $id);
        $critica = $this->Critica->find('first', compact('fields', 'conditions'));
        if (!empty($critica['Critica']['data_validacao'])) {
            $critica['Critica']['data_validacao'] = date('d/m/Y', strtotime($critica['Critica']['data_validacao']));
        }
        $this->request->data = $critica;
}

    public function delete($id) {
        $this->Critica->delete($id);
        $this->Flash->set('Crítica excluída com sucesso!');
        $this->redirect('/criticas');
    }

}
