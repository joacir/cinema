<?php
class GeneroFixture extends CakeTestFixture {
    
    public $name = 'Genero';
    public $import = array('model' => 'Genero', 'records' => false);

    public function init() {
        $this->records = array(
            array('id' => 1, 'nome' => 'Aventura')
        );
        parent::init();
    }

}
?>