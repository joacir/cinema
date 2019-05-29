<?php
App::uses('AppController', 'Controller');

class FilmesController extends AppController {

    public $paginate = array(
        'fields' => array('Filme.id', 'Filme.nome', 'Filme.ano', 'Genero.nome'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Filme.nome' => 'asc')    
    );

    public function setPaginateConditions() {
        $nomeOrIdioma = '';
        if ($this->request->is('post')) {
            $nomeOrIdioma = $this->request->data['Filme']['nome_or_idioma'];
            $this->Session->write('Filme.nome_or_idioma', $nomeOrIdioma);
        } else {
            $nomeOrIdioma = $this->Session->read('Filme.nome_or_idioma');
            $this->request->data('Filme.nome_or_idioma', $nomeOrIdioma);
        }
        if (!empty($nomeOrIdioma)) {
            $this->paginate['conditions']['or'] = array(
                'Filme.nome LIKE' => '%' .trim($nomeOrIdioma) . '%',
                'Filme.idioma LIKE' => '%' . trim($nomeOrIdioma) . '%'
            );
        }
    }

    public function add() {
        parent::add();
        $this->setGeneroAndAtors();
    }

    public function getEditData($id) {
        $this->setGeneroAndAtors();
        $fields = array('Filme.id', 'Filme.nome', 'Filme.duracao', 'Filme.idioma', 'Filme.ano', 'Filme.genero_id');
        $conditions = array('Filme.id' => $id);
     
        return $this->Filme->find('first', compact('fields', 'conditions'));
    }

    public function view($id = null) {
        parent::view($id);
        $this->setGeneroAndAtors();
    }

    public function setGeneroAndAtors() {
        $fields = array('Genero.id', 'Genero.nome');
        $generos = $this->Filme->Genero->find('list', compact('fields'));
        $fields = array('Ator.id', 'Ator.nome');
        $ators = $this->Filme->Ator->find('list', compact('fields'));
        $this->set('generos', $generos);        
        $this->set('ators', $ators);        
    }

}
