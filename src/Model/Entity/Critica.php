<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class Critica extends Entity
{
    public function anoMaiorIgualFilme() {
        $anoMaiorIgualFilme = true;
        if (!empty($this->data_avaliacao) && !empty($this->filme_id)) {
            $filme = TableRegistry::get('Filmes')
                ->get($this->filme_id, ['fields' => ['ano']]);
            $ano = $this->data_avaliacao->format('Y');
            $anoMaiorIgualFilme = $ano >= $filme->ano;    
        }

        return $anoMaiorIgualFilme;
    }
}