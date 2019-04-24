<?php
class GeneroTest extends CakeTestCase {

    public $fixtures = array('app.genero');
    public $Genero = null;

    public function setUp() {
        $this->Genero = ClassRegistry::init('Genero');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Genero, 'Genero'));
    }

    public function testEmptyNome() {
        $data = array('nome' => null);
        $saved = $this->Genero->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '');
        $saved = $this->Genero->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '   ');
        $saved = $this->Genero->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '12');
        $saved = $this->Genero->save($data);
        $this->assertFalse($saved);
    }

    public function testNotUniqueNome() {
        $data = array('nome' => 'Aventura');
        $saved = $this->Genero->save($data);
        $this->assertFalse($saved);
    }

}
?>