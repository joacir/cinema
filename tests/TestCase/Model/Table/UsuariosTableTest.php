<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosTable Test Case
 */
class UsuariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosTable
     */
    protected $Usuarios;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Usuarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Usuarios') ? [] : ['className' => UsuariosTable::class];
        $this->Usuarios = TableRegistry::getTableLocator()->get('Usuarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Usuarios);

        parent::tearDown();
    }

    public function testEmptyNome(): void 
    {
        $data = ['nome' => null];
        $usuario = $this->Usuarios->newEntity($data);
        $this->assertNotEmpty($usuario->getErrors()['nome']);

        $data = ['nome' => ''];
        $usuario = $this->Usuarios->newEntity($data);
        $this->assertNotEmpty($usuario->getErrors()['nome']);

        $data = ['nome' => '   '];
        $usuario = $this->Usuarios->newEntity($data);
        $this->assertNotEmpty($usuario->getErrors()['nome']);

        $data = ['nome' => '12'];
        $usuario = $this->Usuarios->newEntity($data);
        $this->assertNotEmpty($usuario->getErrors()['nome']);
    }

    public function testNotUniqueLogin(): void 
    {
        $usuario = $this->Usuarios->newEntity(['login' => 'jose']);
        $saved = $this->Usuarios->save($usuario);
        $this->assertNotEmpty($usuario->getErrors()['login']);
    }

}
