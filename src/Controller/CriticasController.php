<?php
namespace App\Controller;

class CriticasController extends AppController 
{
    public $layout = 'bootstrap';

    public $paginate = [
        'fields' => ['Criticas.id', 'Criticas.nome', 'Criticas.avaliacao', 'Criticas.data_avaliacao'],
        'conditions' => [],
        'contain' => ['Filmes' => ['fields' => ['nome']]],
        'limit' => 10,
        'order' => ['Criticas.nome' => 'asc']    
    ];

    public function index() 
    {
        if ($this->request->is('post') && !empty($this->request->getData('Criticas.nome'))) {
            $this->paginate['conditions']['Criticas.nome LIKE'] = '%' .trim($this->request->getData('Criticas.nome')) . '%';
        }
        $criticas = $this->paginate();
        $this->set('criticas', $criticas);        
        $this->set('critica', $this->Criticas->newEntity());
    }

    public function add() 
    {
        if (!empty($this->request->getData())) {
            $critica = $this->Criticas->newEntity($this->request->getData());
            if ($this->Criticas->save($critica)) {
                $this->Flash->set('Crítica gravada com sucesso!');
                $this->redirect('/criticas');
            }
        } else {
            $critica = $this->Criticas->newEntity();
        }
        $this->set('critica', $critica);
        $this->set('filmes', $this->Criticas->Filmes
            ->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->toArray()
        );
    }

    public function edit($id = null) 
    {
        if (!empty($this->request->getData())) {
            $critica = $this->Criticas->newEntity($this->request->getData());
            if ($this->Criticas->save($critica)) {
                $this->Flash->set('Crítica alterada com sucesso!');
                $this->redirect('/criticas');
            }
        } else {
            $critica = $this->Criticas->get($id);
        }
        $this->set('critica', $critica);
        $this->set('filmes', $this->Criticas->Filmes
            ->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->toArray()
        );
    }

    public function view($id = null) 
    {
        $this->set('critica', $this->Criticas->get($id, [
            'fields' => ['id', 'nome', 'avaliacao', 'data_avaliacao'],
            'contain' => ['Filmes' => ['fields' => ['nome']]]
        ]));
    }

    public function delete($id) 
    {
        $critica = $this->Criticas->get($id);
        $this->Criticas->delete($critica);
        $this->Flash->set('Crítica excluída com sucesso!');
        $this->redirect('/criticas');
    }

}
