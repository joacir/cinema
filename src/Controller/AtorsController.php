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
            $nome = $this->request->getData('Ator.nome');
            $this->request->getSession()->write('Ator.nome', $nome);
        } else {
            $nome = $this->request->getSession()->read('Ator.nome');
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Ator.nome LIKE'] = '%' . trim($nome) . '%';
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
        $contain = [];
        
        return $this->Ators->get($id, compact('fields', 'contain'));
    }

    public function view($id = null) 
    {
        parent::view($id);
        $this->setFilmes();
    }

}
