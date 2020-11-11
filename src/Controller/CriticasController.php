<?php
declare(strict_types=1);

namespace App\Controller;

class CriticasController extends AppController
{
    public $paginate = [
        'fields' => ['id', 'nome', 'avaliacao', 'data_avaliacao'],
        'contain' => ['Filmes' => ['fields' => ['nome']]],
        'conditions' => ['Criticas.deleted IS NULL'],
        'limit' => 10,        
        'order' => ['Critica.nome' => 'asc']    
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
            $this->paginate['conditions']['Criticas.nome LIKE'] = '%' . trim($nome) . '%';
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

    public function view($id = null) 
    {
        parent::view($id);
        $this->setFilmes();
    }

    public function getEditEntity($id) 
    {
        $fields = ['id', 'nome', 'avaliacao', 'data_avaliacao', 'filme_id'];
        $contain = ['Filmes' => ['fields' => ['nome']]];
        
        return $this->Criticas->get($id, compact('fields', 'contain'));
    }

}
