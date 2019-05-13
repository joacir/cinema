<?php
namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Critica;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class CriticaTest extends TestCase 
{
    public $fixtures = array('app.Criticas', 'app.Filmes');
    public $Criticas = null;

    public function setUp() {
        $this->Criticas = TableRegistry::getTableLocator()->get('Criticas');
    }

    public function testAnoMenorQueFilme() {
        $data = ['data_avaliacao' => '01/01/2018', 'filme_id' => 1];
        $critica = $this->Criticas->newEntity($data);
        $valid = $critica->anoMaiorIgualFilme();
        
        $this->assertFalse($valid);

        $data = ['data_avaliacao' => '01/01/2019', 'filme_id' => 1];
        $critica = $this->Criticas->newEntity($data);
        $valid = $critica->anoMaiorIgualFilme();
        
        $this->assertTrue($valid);
    }

}
