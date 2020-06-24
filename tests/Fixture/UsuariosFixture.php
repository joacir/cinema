<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosFixture
 */
class UsuariosFixture extends TestFixture
{
    public $import = ['table' => 'usuarios'];    

    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'login' => 'jose',
                'senha' => 'Lorem ipsum dolor sit amet',
                'created' => '2020-06-15 18:57:31',
                'modified' => '2020-06-15 18:57:31',
                'deleted' => null,
            ],
        ];
        parent::init();
    }
}
