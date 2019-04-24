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

    public function testEmptyNome() {
        $data = array('nome' => null);
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '');
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '   ');
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '12');
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);
    }

    public function testInvalidNascimento() {
        $data = array('nascimento' => null);
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);

        $data = array('nascimento' => '');
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);

        $data = array('nascimento' => '1245678');
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);

        $data = array('nascimento' => 'ABCD');
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);

        $data = array('nascimento' => 'ABCD');
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);

        $data = array('nascimento' => '2015-05-01');
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);

        $data = array('nascimento' => '35/13/2015');
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);
    }

}
?>