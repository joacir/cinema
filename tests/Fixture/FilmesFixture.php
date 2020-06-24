<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FilmesFixture
 */
class FilmesFixture extends TestFixture
{
    public $import = ['table' => 'filmes'];    
    
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'ano' => 2019,
                'duracao' => 'Lor',
                'idioma' => 'Lorem ipsum dolor sit amet',
                'genero_id' => 1,
                'created' => '2020-06-15 18:57:10',
                'modified' => '2020-06-15 18:57:10',
                'deleted' => null,
            ],
        ];
        parent::init();
    }
}
