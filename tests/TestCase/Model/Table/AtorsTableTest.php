<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AtorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class AtorsTableTest extends TestCase
{
    public $fixtures = ['app.Ators'];
    public $Ators = null;

    public function setUp() {
        $this->Ators = TableRegistry::getTableLocator()->get('Ators');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Ators, 'App\Model\Table\AtorsTable'));
    }

    public function testEmptyNome() {
        $data = ['nome' => null];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getError('nome'));

        $data = ['nome' => ''];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getError('nome'));

        $data = ['nome' => '   '];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getError('nome'));

        $data = ['nome' => '12'];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getError('nome'));
    }

    public function testInvalidNascimento() {
        $data = ['nascimento' => null];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getError('nascimento'));

        $data = ['nascimento' => ''];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getError('nascimento'));

        $data = ['nascimento' => '1245678'];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getError('nascimento'));

        $data = ['nascimento' => 'ABCD'];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getError('nascimento'));

        $data = ['nascimento' => 'ABCD'];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getError('nascimento'));

        $data = ['nascimento' => '2015-05-01'];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getError('nascimento'));

        $data = ['nascimento' => '35/13/2015'];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getError('nascimento'));
    }

}
