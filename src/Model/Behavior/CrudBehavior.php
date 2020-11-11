<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

/**
 * Crud behavior
 */
class CrudBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function excluir($ids) 
    {
        $fields = ['deleted' => date('Y-m-d H:i')];
        $conditions = ['id' => $ids];
        $excluido = $this->_table->updateAll($fields, $conditions);

        return $excluido;
    }       
}
