<?php
class AtorFixture extends CakeTestFixture {
    
    public $name = 'Ator';
    public $import = array('model' => 'Ator', 'records' => false);

    public function init() {
        $this->records = array(
            array('id' => 1, 'nome' => 'Sly', 'nascimento' => '1970-01-23')
        );
        parent::init();
    }

}
?>