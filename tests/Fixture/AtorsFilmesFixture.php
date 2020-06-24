<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AtorsFilmesFixture
 */
class AtorsFilmesFixture extends TestFixture
{
    public $import = ['table' => 'ators_filmes'];    

    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'filme_id' => 1,
                'ator_id' => 1,
            ],
        ];
        parent::init();
    }
}
