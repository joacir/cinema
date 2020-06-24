<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GenerosFixture
 */
class GenerosFixture extends TestFixture
{
    /**
     * Import
     *
     * @var array
     */
    public $import = ['table' => 'generos'];    
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Aventura',
                'created' => '2020-06-15 18:57:23',
                'modified' => '2020-06-15 18:57:23',
                'deleted' => null,
            ],
        ];
        parent::init();
    }
}
