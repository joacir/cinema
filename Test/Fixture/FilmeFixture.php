<?php
class FilmeFixture extends CakeTestFixture {
    
    public $name = 'Filme';
    public $import = array('model' => 'Filme', 'records' => false);

    public function init() {
        $this->records = array(
            array('nome' => 'Avengers', 'ano' => '2019', 'duracao' => '5:00', 'idioma' => 'Ingles', 'genero_id' => 1)
        );
        parent::init();
    }

}
?>