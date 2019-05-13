<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AtorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class CriticasTableTest extends TestCase 
{
    public $fixtures = array('app.Criticas', 'app.Filmes');
    public $Criticas = null;

    public function setUp() {
        $this->Criticas = TableRegistry::getTableLocator()->get('Criticas');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Criticas, 'App\Model\Table\CriticasTable'));
    }

    public function testEmptyNome() {
        $data = ['nome' => null];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('nome'));

        $data = ['nome' => ''];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('nome'));

        $data = ['nome' => '   '];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('nome'));

        $data = ['nome' => '12'];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('nome'));
    }

    public function testInvalidCritica() {
        $data = ['avaliacao' => null];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('avaliacao'));

        $data = ['avaliacao' => ''];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('avaliacao'));

        $data = ['avaliacao' => 0];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('avaliacao'));

        $data = ['avaliacao' => -1];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('avaliacao'));

        $data = ['avaliacao' => 6];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('avaliacao'));
    }

    public function testInvalidDataAvaliacao() {
        $data = ['data_avaliacao' => null];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('data_avaliacao'));

        $data = ['data_avaliacao' => ''];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('data_avaliacao'));

        $data = ['data_avaliacao' => '1245678'];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('data_avaliacao'));

        $data = ['data_avaliacao' => 'ABCD'];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('data_avaliacao'));

        $data = ['data_avaliacao' => 'ABCD'];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('data_avaliacao'));

        $data = ['data_avaliacao' => '2015-05-01'];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('data_avaliacao'));

        $data = ['data_avaliacao' => '35/13/2015'];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getError('data_avaliacao'));
    }

}
