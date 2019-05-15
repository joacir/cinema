<?php
App::uses('AppController', 'Controller');

class GenerosController extends AppController {

    public $layout = 'bootstrap';
    public $helpers = array('Js' => array('Jquery')); 
    public $components = array('RequestHandler');

    public $paginate = array(
        'fields' => array('Genero.id', 'Genero.nome'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Genero.nome' => 'asc')    
    );

    public function index() {
        if ($this->request->is('post') && !empty($this->request->data['Genero']['nome'])) {
            $this->paginate['conditions']['Genero.nome LIKE'] = '%' .trim($this->request->data['Genero']['nome']) . '%';
        }
        $generos = $this->paginate();
        $this->set('generos', $generos);       
        $user = $this->Auth->user(); 
        $temAddButton = $this->Acl->check(array('Usuario' => $user), 'Generos', 'create');
        $this->set('temAddButton', $temAddButton);
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Genero->create();
            if ($this->Genero->save($this->request->data)) {
                $this->Flash->bootstrap('Gênero gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/generos');
            }
        }
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Genero->save($this->request->data)) {
                $this->Flash->bootstrap('Gênero alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/generos');
            }
        } else {
            $fields = array('Genero.id', 'Genero.nome');
            $conditions = array('Genero.id' => $id);
            $this->request->data = $this->Genero->find('first', compact('fields', 'conditions'));
        }
    }

    public function view($id = null) {
        $fields = array('Genero.id', 'Genero.nome');
        $conditions = array('Genero.id' => $id);
        $this->request->data = $this->Genero->find('first', compact('fields', 'conditions'));
    }

    public function delete($id) {
        $this->Genero->delete($id);
        $this->Flash->bootstrap('Gênero excluído com sucesso!', array('key' => 'success'));
        $this->redirect('/generos');
    }

}
