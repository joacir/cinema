<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\Event\Event;
use Cake\Datasource\EntityInterface;
use ArrayObject;

class AtorsTable extends Table 
{
    public function initialize(array $config)
    {
        $this->belongsToMany('Filmes');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notBlank('nome', 'Informe o nome')
            ->minLength('nome', 3, 'Informe um nome com mais de 2 dígitos')
            ->notBlank('nascimento', 'Informe o nascimento')
            ->add('nascimento', 'date', ['rule' => ['date', 'dmy'], 'message' => 'Nascimento inválido']);

        return $validator;            
    }
    
}
