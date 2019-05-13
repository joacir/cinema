<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FilmesTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsToMany('Ators');
        $this->belongsTo('Generos');
        $this->hasMany('Criticas');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notBlank('nome', 'Informe o nome')
            ->notBlank('duracao', 'Informe a duração');

        return $validator;            
    }

}
