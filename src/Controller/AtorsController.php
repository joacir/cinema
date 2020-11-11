<?php
declare(strict_types=1);

namespace App\Controller;

class AtorsController extends AppController
{
    public $paginate = [
        'fields' => ['id', 'nome', 'nascimento'],
        'conditions' => ['Ators.deleted IS NULL'],
        'limit' => 10,        
        'order' => ['nome' => 'asc']    
    ];

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
            $this->paginate['conditions']['Ators.nome LIKE'] = '%' . trim($nome) . '%';
        }
    }

    public function add() 
    {
        parent::add();
        $this->setFilmes();
    }

    public function edit($id = null) 
    {
        parent::edit($id);
        $this->setFilmes();
    }

    public function getEditEntity($id) 
    {
        $fields = ['id', 'nome', 'nascimento'];
        $contain = ['Filmes'];
        
        return $this->Ators->get($id, compact('fields', 'contain'));
    }

    public function view($id = null) 
    {
        parent::view($id);
        $this->setFilmes();
    }

}
