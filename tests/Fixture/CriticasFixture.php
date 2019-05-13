<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class CriticasFixture extends TestFixture 
{   
    public $import = ['model' => 'Criticas'];

    public function init() 
    {
        $this->records = [
            ['id' => 1, 'nome' => 'Jose', 'avaliacao' => 10, 'data_avaliacao' => time()]
        ];
        parent::init();
    }

}