<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class AtorsFixture extends TestFixture 
{
    public $import = ['model' => 'Ators'];

    public function init() 
    {
        $this->records = [
            ['id' => 1, 'nome' => 'Sly', 'nascimento' => '1970-01-23']
        ];
        parent::init();
    }

}
