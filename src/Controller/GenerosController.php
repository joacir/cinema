<?php
namespace App\Controller;

class GenerosController extends AppController 
{
    public $layout = 'bootstrap';

    public $paginate = [
        'fields' => ['id', 'nome'],
        'order' => ['nome' => 'asc'],
        'group' => [],
        'limit' => 10,
        'conditions' => []
    ];

    public function index() 
    {
        if ($this->request->is('post') && !empty($this->request->getData('Generos.nome'))) {
            $this->paginate['conditions']['Generos.nome LIKE'] = '%' .trim($this->request->getData('Generos.nome')) . '%';
        }
        $generos = $this->paginate();
        
        $this->set('genero', $this->Generos->newEntity());
        $this->set('generos', $generos);        
    }

    public function add() 
    {
        if (!empty($this->request->getData())) {
            $genero = $this->Generos->newEntity($this->request->getData());
            if ($this->Generos->save($genero)) {
                $this->Flash->set('Gênero gravado com sucesso!');
                $this->redirect('/generos');
            }
        } else {
            $genero = $this->Generos->newEntity();
        }
        $this->set('genero', $genero);
    }

    public function edit($id = null) 
    {
        if (!empty($this->request->getData())) {
            $genero = $this->Generos->newEntity($this->request->getData());
            if ($this->Generos->save($genero)) {
                $this->Flash->set('Gênero alterado com sucesso!');
                $this->redirect('/generos');
            }
        } else {
            $genero = $this->Generos->get($id);
        }
        $this->set('genero', $genero);
    }

    public function view($id = null) 
    {
        $this->set('genero', $this->Generos->get($id));
    }

    public function delete($id) 
    {
        $genero = $this->Generos->get($id);
        $this->Generos->delete($genero);
        $this->Flash->set('Gênero excluído com sucesso!');
        $this->redirect('/generos');
    }

}
