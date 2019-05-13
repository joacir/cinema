<?php
namespace App\Controller;

class FilmesController extends AppController 
{
    public $layout = 'bootstrap';

    public $paginate = array(
        'fields' => ['Filmes.id', 'Filmes.nome', 'Filmes.ano'],
        'conditions' => [],
        'contain' => ['Generos' => ['fields' => ['nome']]],
        'limit' => 10,
        'order' => ['Filmes.nome' => 'asc']    
    );

    public function index() 
    {
        if ($this->request->is('post') && !empty($this->request->getData())) {
            $this->paginate['conditions']['or'] = [
                'Filmes.nome LIKE' => '%' .trim($this->request->getData('Filmes.nome_or_idioma')) . '%',
                'Filmes.idioma LIKE' => '%' . trim($this->request->getData('Filmes.nome_or_idioma')) . '%'
            ];
        }
        $filmes = $this->paginate();

        $this->set('filmes', $filmes);        
        $this->set('filme', $this->Filmes->newEntity());
    }

    public function add() 
    {
        if (!empty($this->request->getData())) {
            $filme = $this->Filmes->newEntity($this->request->getData());
            if ($this->Filmes->save($filme)) {
                $this->Flash->set('Filme gravado com sucesso!');
                $this->redirect('/filmes');
            }
        } else {
            $filme = $this->Filmes->newEntity();
        }
        $generos = $this->Filmes->Generos
            ->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->toArray();
        $ators = $this->Filmes->Ators
            ->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->toArray();
        $this->set('generos', $generos);        
        $this->set('ators', $ators);        
        $this->set('filme', $filme);
    }

    public function edit($id = null) 
    {
        if (!empty($this->request->getData())) {
            $filme = $this->Filmes->newEntity($this->request->getData());
            if ($this->Filmes->save($filme)) {
                $this->Flash->set('Filme alterado com sucesso!');
                $this->redirect('/filmes');
            }
        } else {
            $filme = $this->Filmes->get($id, ['contain' => ['Ators']]);
        }
        $generos = $this->Filmes->Generos
            ->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->toArray();
        $ators = $this->Filmes->Ators
            ->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->toArray();
        $this->set('generos', $generos);        
        $this->set('ators', $ators);        
        $this->set('filme', $filme);
    }

    public function view($id = null) 
    {
        $generos = $this->Filmes->Generos
            ->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->toArray();
        $ators = $this->Filmes->Ators
            ->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->toArray();
        $this->set('generos', $generos);        
        $this->set('ators', $ators);        
        $this->set('filme', $this->Filmes->get($id, ['contain' => ['Ators']]));
    }

    public function delete($id) 
    {
        $filme = $this->Filmes->get($id);
        $this->Filmes->delete($filme);
        $this->Flash->set('Filme excluído com sucesso!');
        $this->redirect('/filmes');
    }

}
