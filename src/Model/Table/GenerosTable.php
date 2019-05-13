<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Rule\IsUnique;

class GenerosTable extends Table 
{
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('nome', 'Informe o nome')
            ->minLength('nome', 3, 'Informe um nome com mais de 2 dígitos');

        return $validator;            
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['nome'], 'Nome já existe'));

        return $rules;
    }
    
}
