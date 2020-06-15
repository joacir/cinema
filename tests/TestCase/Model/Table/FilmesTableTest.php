<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilmesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilmesTable Test Case
 */
class FilmesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FilmesTable
     */
    protected $Filmes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Filmes',
        'app.Generos',
        'app.Criticas',
        'app.Ators',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Filmes') ? [] : ['className' => FilmesTable::class];
        $this->Filmes = TableRegistry::getTableLocator()->get('Filmes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Filmes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
