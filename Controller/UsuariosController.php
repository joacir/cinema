<?php
App::uses('AppController', 'Controller');

class UsuariosController extends AppController {

    public $layout = 'bootstrap';
    public $helpers = array('Js' => array('Jquery')); 
    public $components = array(
        'RequestHandler',
/*
        4 - Configurar Components

        'Auth' => array(
            'flash' => array('element' => 'bootstrap', 'params' => array('key' => 'warning'), 'key' => 'warning'),
            'authError' => 'Você não possui permissão para acessar essa operação.',
            'loginAction' => '/usuarios/login',
            'loginRedirect' => '/ators',
            'logoutRedirect' => '/usuarios/login',
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Usuario',
                    'fields' => array('username' => 'login', 'password' => 'senha'),
                    'passwordHasher' => array('className' => 'Simple', 'hashType' => 'sha256')
                )
            ),

            7 - Configurar Crud (Aplicar em todo App)
            'authorize' => array('Crud' => array('userModel' => 'Usuario'))
        ),  
        

        6 - Configurar ACL (shell)

        'Acl'
*/        
    );

    public $paginate = array(
        'fields' => array('Usuario.id', 'Usuario.nome'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Usuario.nome' => 'asc')    
    );

    public function index() {
        if ($this->request->is('post') && !empty($this->request->data['Usuario']['nome'])) {
            $this->paginate['conditions']['Usuario.nome LIKE'] = '%' .trim($this->request->data['Usuario']['nome']) . '%';
        }
        $usuarios = $this->paginate();
        $this->set('usuarios', $usuarios);        
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->bootstrap('Usuário gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/usuarios');
            }
        }
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->bootstrap('Usuário alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/usuarios');
            }
        } else {
            $fields = array('Usuario.id', 'Usuario.nome', 'Usuario.login', 'Usuario.senha');
            $conditions = array('Usuario.id' => $id);
            $this->request->data = $this->Usuario->find('first', compact('fields', 'conditions'));
        }
    }

    public function view($id = null) {
        $fields = array('Usuario.id', 'Usuario.nome', 'Usuario.login', 'Usuario.senha');
        $conditions = array('Usuario.id' => $id);
        $this->request->data = $this->Usuario->find('first', compact('fields', 'conditions'));
    }

    public function delete($id) {
        $this->Usuario->delete($id);
        $this->Flash->bootstrap('Usuário excluído com sucesso!', array('key' => 'success'));
        $this->redirect('/usuarios');
    }

    /**
     * 2 - crud/ação de login
     */
    public function login() {
        $this->layout = 'login';
  /*

        5 - Autenticar

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->bootstrap('Usuário ou senha incorretos', array('key' => 'danger'));
        }        
*/        
    }

    public function logout() {
        $this->Auth->logout();
        $this->redirect('/usuarios');
    }

}
