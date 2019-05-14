<?php
class UsuarioTest extends CakeTestCase {

    public $fixtures = array('app.usuario');
    public $Usuario = null;

    public function setUp() {
        $this->Usuario = ClassRegistry::init('Usuario');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Usuario, 'Usuario'));
    }

    public function testEmptyNome() {
        $data = array('nome' => null);
        $saved = $this->Usuario->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '');
        $saved = $this->Usuario->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '   ');
        $saved = $this->Usuario->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '12');
        $saved = $this->Usuario->save($data);
        $this->assertFalse($saved);
    }

    public function testNotUniqueNome() {
        $data = array('login' => 'jose');
        $saved = $this->Usuario->save($data);
        $this->assertFalse($saved);
    }

}
?>