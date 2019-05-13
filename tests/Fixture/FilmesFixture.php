<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class FilmesFixture extends TestFixture 
{    
    public $import = ['model' => 'Filmes'];

    public function init() 
    {
        $this->records = [
            ['nome' => 'Avengers', 'ano' => '2019', 'duracao' => '5:00', 'idioma' => 'Ingles', 'genero_id' => 1]
        ];
        parent::init();
    }

}
