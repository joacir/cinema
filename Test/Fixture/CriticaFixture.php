<?php
class CriticaFixture extends CakeTestFixture {
    
    public $name = 'Critica';
    public $import = array('model' => 'Critica', 'records' => false);

    public function init() {
        $this->records = array(
            array('id' => 1, 'nome' => 'Jose', 'avaliacao' => 10, 'data_avaliacao' => time())
        );
        parent::init();
    }

}
?>