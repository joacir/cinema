<?php
declare(strict_types=1);

namespace App\Controller;

class FilmesController extends AppController
{
    public $paginate = [
        'fields' => ['id', 'nome', 'ano'],
        'contain' => ['Generos' => ['fields' => ['nome']]],
        'conditions' => ['Filmes.deleted IS NULL'],
        'limit' => 10,
        'order' => ['nome' => 'asc']    
    ];

    public function setPaginateConditions() 
    {
        $nomeOrIdioma = '';
        if ($this->request->is('post')) {
            $nomeOrIdioma = $this->request->getData('nome_or_idioma');
            $this->request->getSession()->write('nome_or_idioma', $nomeOrIdioma);
        } else {
            $nomeOrIdioma = $this->request->getSession()->read('nome_or_idioma');
        }
        if (!empty($nomeOrIdioma)) {
            $this->paginate['conditions']['or'] = [
                'Filmes.nome LIKE' => '%' .trim($nomeOrIdioma) . '%',
                'Filmes.idioma LIKE' => '%' . trim($nomeOrIdioma) . '%'
            ];
        }
    }

    public function add() 
    {
        parent::add();
        $this->setGeneroAndAtors();
    }

    public function getEditEntity($id) 
    {
        $this->setGeneroAndAtors();
        $fields = ['id', 'nome', 'duracao', 'idioma', 'ano', 'genero_id'];
        $contain = ['Ators'];
     
        return $this->Filmes->get($id, compact('fields', 'contain'));
    }

    public function view($id = null) 
    {
        parent::view($id);
        $this->setGeneroAndAtors();
    }

    public function setGeneroAndAtors() 
    {
        $generos = $this->Filmes->Generos->find('list', ['conditions' => 'Generos.deleted IS NULL']);
        $ators = $this->Filmes->Ators->find('list', ['conditions' => 'Ators.deleted IS NULL']);
        $this->set('generos', $generos);        
        $this->set('ators', $ators);        
    }
}
