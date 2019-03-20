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
        $fields = array('Filme.nome', 'Filme.ano');
        $order = array('Filme.ano' => 'desc');
        $group = array();
        $conditions = array(
            'Filme.ano BETWEEN ? AND ?' => array(1980, 2000),
            'Filme.duracao !=' => '3:00' 
        );
//        $filmes = $this->Filme->find('all', compact('fields', 'order', 'conditions'));
        $filmes = $this->Filme->findAllByDuracao('2:00');

        $this->set('filmes', $filmes);        
    }

}
