<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AtorsFixture
 */
class AtorsFixture extends TestFixture
{
    public $import = ['table' => 'ators'];    

    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'nascimento' => '2020-06-15 18:57:01',
                'created' => '2020-06-15 18:57:01',
                'modified' => '2020-06-15 18:57:01',
                'deleted' => null,
            ],
        ];
        parent::init();
    }
}
