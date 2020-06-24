<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GenerosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GenerosTable Test Case
 */
class GenerosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GenerosTable
     */
    protected $Generos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Generos',
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
        $config = TableRegistry::getTableLocator()->exists('Generos') ? [] : ['className' => GenerosTable::class];
        $this->Generos = TableRegistry::getTableLocator()->get('Generos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Generos);

        parent::tearDown();
    }

    public function testEmptyNome(): void 
    {
        $data = ['nome' => null];
        $genero = $this->Generos->newEntity($data);
        $this->assertNotEmpty($genero->getErrors()['nome']);

        $data = ['nome' => ''];
        $genero = $this->Generos->newEntity($data);
        $this->assertNotEmpty($genero->getErrors()['nome']);

        $data = ['nome' => '   '];
        $genero = $this->Generos->newEntity($data);
        $this->assertNotEmpty($genero->getErrors()['nome']);

        $data = ['nome' => '12'];
        $genero = $this->Generos->newEntity($data);
        $this->assertNotEmpty($genero->getErrors()['nome']);
    }

    public function testNotUniqueNome(): void 
    {
        $genero = $this->Generos->newEntity(['nome' => 'Aventura']);
        $saved = $this->Generos->save($genero);
        $this->assertNotEmpty($genero->getErrors()['nome']);
    }

}
