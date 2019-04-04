<?php
class AtorTest extends CakeTestCase {

    public $fixtures = array('app.ator');
    public $Ator = null;

    public function setUp() {
        $this->Ator = ClassRegistry::init('Ator');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Ator, 'Ator'));
    }


}
?>