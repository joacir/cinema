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
