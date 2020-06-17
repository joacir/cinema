<?php
declare(strict_types=1);

namespace App\Controller;

class UsuariosController extends AppController
{
    public $paginate = [
        'fields' => ['id', 'nome'],
        'conditions' => ['Usuarios.deleted IS NULL'],
        'limit' => 10,
        'order' => ['nome' => 'asc']   
    ];
/*
    public function beforeFilter(EventInterface $event) 
    {
        $this->Auth->allow(array('logout','login'));            
        parent::beforeFilter($event);
    }             
*/
    public function setPaginateConditions() 
    {
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->getData('Usuario.nome');
            $this->request->getSession()->write('Usuario.nome', $nome);
        } else {
            $nome = $this->request->getSession()->read('Usuario.nome');
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['nome LIKE'] = '%' . trim($nome) . '%';
        }
    }

    public function add() 
    {
        parent::add();
//        $this->setAroList();
    }

    public function edit($id = null) {
        parent::edit($id);
//        $this->setAroList();
    }

    public function getEditEntity($id) 
    {        
        $fields = ['id', 'nome', 'login', 'aro_parent_id'];
        $contain = [];
        
        return $this->Usuarios->get($id, compact('fields', 'contain'));
    }

    public function view($id = null) 
    {
        parent::view($id);
//        $this->setAroList();
    }

/*    
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
*/
}
