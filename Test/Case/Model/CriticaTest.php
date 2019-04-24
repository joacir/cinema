<?php
class CriticaTest extends CakeTestCase {

    public $fixtures = array('app.critica', 'app.filme');
    public $Critica = null;

    public function setUp() {
        $this->Critica = ClassRegistry::init('Critica');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Critica, 'Critica'));
    }

    public function testEmptyNome() {
        $data = array('nome' => null);
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '');
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '   ');
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('nome' => '12');
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);
    }

    public function testInvalidCritica() {
        $data = array('avaliacao' => null);
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('avaliacao' => '');
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('avaliaca' => 0);
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('avaliaca' => -1);
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('avaliacao' => 6);
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);
    }

    public function testInvalidDataAvaliacao() {
        $data = array('data_avaliacao' => null);
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('data_avaliacao' => '');
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('data_avaliacao' => '1245678');
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('data_avaliacao' => 'ABCD');
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('data_avaliacao' => 'ABCD');
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('data_avaliacao' => '2015-05-01');
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);

        $data = array('data_avaliacao' => '35/13/2015');
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);
    }

    public function testAnoMenorQueFilme() {
        $checked = array('data_avaliacao' => '01/01/2018');
        $this->Critica->set(array('filme_id' => 1));

        $valid = $this->Critica->anoMaiorIgualFilme($checked);
        
        $this->assertFalse($valid);
    }


}
?>