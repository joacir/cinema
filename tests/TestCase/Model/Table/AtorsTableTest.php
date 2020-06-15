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

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
