<?php
App::uses('AppController', 'Controller');

class FilmesController extends AppController {

    public function index() {
        $fields = array('Filme.id', 'Filme.nome', 'Filme.ano', 'Genero.nome');
        $order = array('Filme.nome' => 'asc');
        $group = array();
        $conditions = array();
        $filmes = $this->Filme->find('all', compact('fields', 'order', 'conditions'));

        $this->set('filmes', $filmes);        
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Filme->create();
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->set('Filme gravado com sucesso!');
                $this->redirect('/filmes');
            }
        }
        $fields = array('Genero.id', 'Genero.nome');
        $generos = $this->Filme->Genero->find('list', compact('fields'));
        $this->set('generos', $generos);        
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->set('Filme alterado com sucesso!');
                $this->redirect('/filmes');
            }
        } else {
            $fields = array('Filme.id', 'Filme.nome', 'Filme.duracao', 'Filme.idioma', 'Filme.ano', 'Filme.genero_id');
            $conditions = array('Filme.id' => $id);
            $this->request->data = $this->Filme->find('first', compact('fields', 'conditions'));
        }
        $fields = array('Genero.id', 'Genero.nome');
        $generos = $this->Filme->Genero->find('list', compact('fields'));
        $this->set('generos', $generos);        
    }

    public function view($id = null) {
        $fields = array('Filme.id', 'Filme.nome', 'Filme.duracao', 'Filme.idioma', 'Filme.ano');
        $conditions = array('Filme.id' => $id);
        $this->request->data = $this->Filme->find('first', compact('fields', 'conditions'));
    }

    public function delete($id) {
        $this->Filme->delete($id);
        $this->Flash->set('Filme excluído com sucesso!');
        $this->redirect('/filmes');
    }

}
