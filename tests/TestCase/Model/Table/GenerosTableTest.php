<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GenerosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class GenerosTableTest extends TestCase 
{
    public $fixtures = ['app.Generos'];
    public $Generos = null;

    public function setUp() {
        $this->Generos = TableRegistry::getTableLocator()->get('Generos');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Generos, 'App\Model\Table\GenerosTable'));
    }

    public function testEmptyNome() {
        $data = ['nome' => null];
        $genero = $this->Generos->newEntity($data);
        $this->assertNotEmpty($genero);

        $data = ['nome' => ''];
        $genero = $this->Generos->newEntity($data);
        $this->assertNotEmpty($genero);

        $data = ['nome' => '   '];
        $genero = $this->Generos->newEntity($data);
        $this->assertNotEmpty($genero);

        $data = ['nome' => '12'];
        $genero = $this->Generos->newEntity($data);
        $this->assertNotEmpty($genero);
    }

    public function testNotUniqueNome() {
        $data = ['nome' => 'Aventura'];
        $genero = $this->Generos->newEntity($data);
        $this->Generos->save($genero);
        $this->assertNotEmpty($genero->getError('nome'));
    }

}
?>