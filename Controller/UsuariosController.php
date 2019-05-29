<?php
App::uses('AppController', 'Controller');

class UsuariosController extends AppController {

    public $paginate = array(
        'fields' => array('Usuario.id', 'Usuario.nome'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Usuario.nome' => 'asc')    
    );

    public function beforeFilter() {
        $this->Auth->allow(array('logout','login'));            
        parent::beforeFilter();
    }             

    public function setPaginateConditions() {
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->data['Usuario']['nome'];
            $this->Session->write('Usuario.nome', $nome);
        } else {
            $nome = $this->Session->read('Usuario.nome');
            $this->request->data('Usuario.nome', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Usuario.nome LIKE'] = '%' . trim($nome) . '%';
        }
    }

    public function add() {
        parent::add();
        $this->setAroList();
    }

    public function edit($id = null) {
        parent::edit($id);
        $this->setAroList();
    }

    public function getEditData($id) {        
        $fields = array('Usuario.id', 'Usuario.nome', 'Usuario.login', 'Usuario.aro_parent_id');
        $conditions = array('Usuario.id' => $id);
        
        return $this->Usuario->find('first', compact('fields', 'conditions'));
    }

    public function view($id = null) {
        parent::view($id);
        $this->setAroList();
    }

    public function login() {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->bootstrap('Usuário ou senha incorretos', array('key' => 'danger'));
        }        
    }

    public function logout() {
        $this->Auth->logout();
        $this->redirect('/login');
    }

    public function setAroList() {
        $aros = $this->Acl->Aro->find('list', [
            'conditions' => ['Aro.parent_id IS NULL'], 
            'fields' => ['Aro.id', 'Aro.alias']
        ]);
        $this->set('aros', $aros);
    }

}
