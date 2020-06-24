<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CriticasFixture
 */
class CriticasFixture extends TestFixture
{
    public $import = ['table' => 'criticas'];    

    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'avaliacao' => 1,
                'data_avaliacao' => '2020-06-15 18:57:16',
                'filme_id' => 1,
                'created' => '2020-06-15 18:57:16',
                'modified' => '2020-06-15 18:57:16',
                'deleted' => null,
            ],
        ];
        parent::init();
    }
}
