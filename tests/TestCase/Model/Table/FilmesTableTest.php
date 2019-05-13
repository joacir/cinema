<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilmesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class FilmesTableTest extends TestCase 
{
    public $fixtures = ['app.Filmes'];
    public $Filmes = null;

    public function setUp() {
        $this->Filmes = TableRegistry::getTableLocator()->get('Filmes');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Filmes, 'App\Model\Table\FilmesTable'));
    }

    public function testNomeEmpty() {
        $data = ['nome' => null];
        $filme = $this->Filmes->newEntity($data);
        $this->assertNotEmpty($filme->getError('nome'));
    }

    public function testDuracaoEmpty() {
        $data = ['duracao' => null];
        $filme = $this->Filmes->newEntity($data);
        $this->assertNotEmpty($filme->getError('duracao'));
    }

}
?>