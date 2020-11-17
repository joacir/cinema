<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AtorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AtorsTable Test Case
 */
class AtorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AtorsTable
     */
    protected $Ators;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Ators',
        'app.Filmes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ators') ? [] : ['className' => AtorsTable::class];
        $this->Ators = TableRegistry::getTableLocator()->get('Ators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Ators);

        parent::tearDown();
    }

    public function testEmptyNome(): void 
    {
        $data = ['nome' => null];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getErrors()['nome']);

        $data = ['nome' => ''];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getErrors()['nome']);

        $data = ['nome' => '   '];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getErrors()['nome']);

        $data = ['nome' => '12'];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getErrors()['nome']);
    }

    public function testEmptyNascimento(): void 
    {
        $data = ['nascimento' => null];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getErrors()['nascimento']);

        $data = ['nascimento' => ''];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getErrors()['nascimento']);

        $data = ['nascimento' => '   '];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getErrors()['nascimento']);
    }

    public function testInvalidNascimento(): void 
    {
        $data = ['nascimento' => '2009-01-01'];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getErrors()['nascimento']);

        $data = ['nascimento' => '123456'];
        $ator = $this->Ators->newEntity($data);
        $this->assertNotEmpty($ator->getErrors()['nascimento']);
    }

}
