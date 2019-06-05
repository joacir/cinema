<?php
class AtorsFilmeFixture extends CakeTestFixture {
    
    public $name = 'AtorsFilme';
    public $import = array('table' => 'ators_filmes', 'records' => false);

    public function init() {
        $this->records = array(
            array('ator_id' => 1, 'filme_id' => 1)
        );
        parent::init();
    }

}
?>