<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class GenerosFixture extends TestFixture 
{    
    public $import = ['model' => 'Generos'];

    public function init() 
    {
        $this->records = [
            ['id' => 1, 'nome' => 'Aventura']
        ];
        parent::init();
    }

}
