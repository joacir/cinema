<?php
namespace App\Controller;

use Cake\ORM\Query;

class AtorsController extends AppController 
{
    public $layout = 'bootstrap';

    public $paginate = [
        'fields' => ['Ators.id', 'Ators.nome', 'Ators.nascimento'],
        'conditions' => [],
        'limit' => 10,
        'order' => ['Ators.nome' => 'asc']    
    ];

    public function index() 
    {
        if ($this->request->is('post') && !empty($this->request->getData('Ators.nome'))) {
            $this->paginate['conditions']['Ators.nome LIKE'] = '%' .trim($this->request->getData('Ators.nome')) . '%';
        }
        $ators = $this->paginate();
        $this->set('ators', $ators);        
        $this->set('ator', $this->Ators->newEntity());
    }

    public function add() 
    {
        if (!empty($this->request->getData())) {
            $ator = $this->Ators->newEntity($this->request->getData());
            if ($this->Ators->save($ator)) {
                $this->Flash->set('Ator gravado com sucesso!');
                $this->redirect('/ators');
            }
        } else {
            $ator = $this->Ators->newEntity();
        }
        $this->set('ator', $ator);
        $this->set('filmes', $this->Ators->Filmes
            ->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->toArray()
        );
    }

    public function edit($id = null) 
    {
        if (!empty($this->request->getData())) {
            $ator = $this->Ators->newEntity($this->request->getData());
            if ($this->Ators->save($ator)) {
                $this->Flash->set('Ator alterado com sucesso!');
                $this->redirect('/ators');
            }
        } else {
            $fields = ['Ators.id', 'Ators.nome', 'Ators.nascimento'];
            $conditions = ['Ators.id' => $id];
            $ator = $this->Ators->find('all', compact('fields', 'conditions'))
                ->contain(['Filmes' => function(Query $q) {
                    return $q->select(['id']);
                }])
                ->first();            
        }
        $this->set('ator', $ator);
        $this->set('filmes', $this->Ators->Filmes
            ->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->toArray()
        );
    }

    public function view($id = null) 
    {
        $fields = ['Ators.id', 'Ators.nome', 'Ators.nascimento'];
        $conditions = ['Ators.id' => $id];
        $ator = $this->Ators->find('all', compact('fields', 'conditions'))
            ->contain(['Filmes' => function(Query $q) {
                return $q->select(['id']);
            }])
            ->first();            
        $this->set('ator', $ator);
        $this->set('filmes', $this->Ators->Filmes
            ->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->toArray()
        );
    }

    public function delete($id) 
    {
        $ator = $this->Ators->get($id);
        $this->Ators->delete($ator);
        $this->Flash->set('Ator excluído com sucesso!');
        $this->redirect('/ators');
    }

}
