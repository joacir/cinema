<?php
App::uses('AppController', 'Controller');

class CriticasController extends AppController {

    public $layout = 'bootstrap';
    public $helpers = array('Js' => array('Jquery'), 'Pdf.Report'); 
    public $components = array('RequestHandler');

    public $paginate = array(
        'fields' => array('Critica.id', 'Critica.nome', 'Critica.avaliacao', 'Critica.data_avaliacao', 'Filme.nome'),
        'conditions' => array(),
        'limit' => 10,        
        'order' => array('Critica.nome' => 'asc')    
    );

    public function beforeFilter() {
        $this->Auth->mapActions(['read' => ['report']]);
    }

    public function index() {
        if ($this->request->is('post') && !empty($this->request->data['Critica']['nome'])) {
            $this->paginate['conditions']['Critica.nome LIKE'] = '%' .trim($this->request->data['Critica']['nome']) . '%';
        }
        $criticas = $this->paginate();
        $this->set('criticas', $criticas);        
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Critica->create();
            if ($this->Critica->save($this->request->data)) {
                $this->Flash->bootstrap('Crítica gravada com sucesso!', array('key' => 'success'));
                $this->redirect('/criticas');
            }
        }
        $this->set('filmes', $this->Critica->Filme->find('list', array('fields' => array('Filme.id', 'Filme.nome'))));
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Critica->save($this->request->data)) {
                $this->Flash->bootstrap('Crítica alterada com sucesso!', array('key' => 'success'));
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
        $this->Flash->bootstrap('Crítica excluída com sucesso!', array('key' => 'warning'));
        $this->redirect('/criticas');
    }

    public function report() {
        $this->layout = false;
        $this->response->type('pdf');
        $fields = array('Critica.nome', 'Critica.avaliacao');
        $criticas = $this->Critica->find('all', compact('fields'));
        $this->set('criticas', $criticas);
    }


}
