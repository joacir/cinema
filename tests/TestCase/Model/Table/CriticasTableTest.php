<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CriticasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CriticasTable Test Case
 */
class CriticasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CriticasTable
     */
    protected $Criticas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Criticas',
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
        $config = TableRegistry::getTableLocator()->exists('Criticas') ? [] : ['className' => CriticasTable::class];
        $this->Criticas = TableRegistry::getTableLocator()->get('Criticas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Criticas);

        parent::tearDown();
    }

    public function testEmptyNome(): void 
    {
        $data = ['nome' => null];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['nome']);

        $data = ['nome' => ''];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['nome']);

        $data = ['nome' => '   '];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['nome']);

        $data = ['nome' => '12'];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['nome']);
    }

    public function testEmptyAvaliacao(): void 
    {
        $data = ['avaliacao' => null];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['avaliacao']);

        $data = ['avaliacao' => ''];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['avaliacao']);

        $data = ['avaliacao' => '   '];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['avaliacao']);
    }

    public function testInvalidAvaliacao(): void 
    {
        $data = ['avaliacao' => -1];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['avaliacao']);

        $data = ['avaliacao' => 0];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['avaliacao']);

        $data = ['avaliacao' => 6];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['avaliacao']);
    }

    public function testEmptyDataAvaliacao(): void 
    {
        $data = ['data_avaliacao' => null];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['data_avaliacao']);

        $data = ['data_avaliacao' => ''];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['data_avaliacao']);

        $data = ['data_avaliacao' => '   '];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['data_avaliacao']);
    }

    public function testInvalidDataAvaliacao(): void 
    {
        $data = ['data_avaliacao' => '1234'];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['data_avaliacao']);

        $data = ['data_avaliacao' => '2001-01-15'];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['data_avaliacao']);

        $data = ['data_avaliacao' => '01/13/2010'];
        $critica = $this->Criticas->newEntity($data);
        $this->assertNotEmpty($critica->getErrors()['data_avaliacao']);

        $data = ['data_avaliacao' => '01/12/2010'];
        $critica = $this->Criticas->newEntity($data);
        $this->assertEmpty($critica->getErrors());
    }

    public function testAnoMenorQueFilme(): void 
    {
        $data = ['data_avaliacao' => '01/01/2018', 'filme_id' => 1];
        $critica = $this->Criticas->newEntity($data);
        $saved = $this->Criticas->save($critica);
        $this->assertNotEmpty($critica->getErrors()['data_avaliacao']);
    }

}
