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

    public function beforeFilter(\Cake\Event\EventInterface $event) 
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['login', 'add']);    
    }             

    public function setPaginateConditions() 
    {
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->getData('nome');
            $this->request->getSession()->write('nome', $nome);
        } else {
            $nome = $this->request->getSession()->read('nome');
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Usuarios.nome LIKE'] = '%' . trim($nome) . '%';
        }
    }

    public function add() 
    {
        parent::add();
    }

    public function edit($id = null) {
        parent::edit($id);
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
    }

    
    public function login() 
    {
        $this->Authorization->skipAuthorization();
        $this->viewBuilder()->setLayout('login');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/';
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->bootstrap(__('Usuário ou senha incorretos'), ['key' => 'danger']);            
        }        
    }

    public function logout() 
    {
        $this->Authorization->skipAuthorization();
        $this->Authentication->logout();
        
        return $this->redirect('/');    
    }

}
