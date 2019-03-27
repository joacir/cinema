<?php
App::uses('AppController', 'Controller');

class FilmesController extends AppController {

    public function index() {
/*
        $filmes = array(
            array('Filme' => array('nome' => 'Avengers', 'ano' => '2019', 'duracao' => '5:00', 'idioma' => 'Ingles')),
            array('Filme' => array('nome' => 'Rocky', 'ano' => '1979', 'duracao' => '3:00', 'idioma' => 'Ingles')),
            array('Filme' => array('nome' => 'De volta para o futuro', 'ano' => '1986', 'duracao' => '2:00', 'idioma' => 'Ingles')),
            array('Filme' => array('nome' => 'Esqueceram de mim', 'ano' => '1994', 'duracao' => '1:30', 'idioma' => 'Ingles')),
            array('Filme' => array('nome' => 'Star Wars', 'ano' => '1977', 'duracao' => '3:00', 'idioma' => 'Ingles')),
        );
 */  
        $fields = array('Filme.id', 'Filme.nome', 'Filme.ano');
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
/*
se tem informacao
    receber informacoes
    mandar pro modelo gravar
        mensagem usuario 
        redirecionar filmes
senao
    mostra formulario
*/        
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->set('Filme alterado com sucesso!');
                $this->redirect('/filmes');
            }
        } else {
            $fields = array('Filme.id', 'Filme.nome', 'Filme.duracao', 'Filme.idioma', 'Filme.ano');
            $conditions = array('Filme.id' => $id);
            $this->request->data = $this->Filme->find('first', compact('fields', 'conditions'));
        }
/*
se tem informacao
    receber informacoes
    mandar pro modelo gravar
        mensagem usuario 
        redirecionar filmes
senao
    busca informacoes do id
    mostra formulario
*/        
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
