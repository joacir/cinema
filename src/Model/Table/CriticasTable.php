<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class CriticasTable extends Table 
{
    public function initialize(array $config)
    {
        $this->belongsTo('Filmes');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notBlank('nome', 'Informe o nome')
            ->minLength('nome', 3, 'Informe um nome com mais de 2 dígitos')
            ->notBlank('avaliacao', 'Informe a avaliação')
            ->range('avaliacao',  [1, 5], 'Avaliação inválida')
            ->notBlank('data_avaliacao', 'Informe a data de avaliação')
            ->date('data_avaliacao', 'dmy', 'Data de avaliação inválida');

        return $validator;            
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add(function ($critica, $options) {
            return $critica->anoMaiorIgualFilme();
        }, 'anoMaiorIgualFilme', ['errorField' => 'data_avaliacao', 'message' => 'Nome já existe']);

        return $rules;
    }

}
