<?php
class UsuarioFixture extends CakeTestFixture {
    
    public $name = 'Usuario';
    public $import = array('model' => 'Usuario', 'records' => false);

    public function init() {
        $this->records = array(
            array('id' => 1, 'nome' => 'Jose dos santos', 'login' => 'jose', 'senha' => '')
        );
        parent::init();
    }

}
?>