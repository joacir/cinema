<?php
declare(strict_types=1);

namespace App\Controller;

class GenerosController extends AppController
{
    public $paginate = [
        'fields' => ['id', 'nome'],
        'conditions' => ['Generos.deleted IS NULL'],
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
            $this->paginate['conditions']['nome LIKE'] = '%' . trim($nome) . '%';
        }
    }

    public function getEditEntity($id) 
    {
        $fields = ['id', 'nome'];
        $contain = [];
      
        return $this->Generos->get($id, compact('fields', 'contain'));
    }

}
