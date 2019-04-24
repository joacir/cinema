<?php
App::uses('AppModel', 'Model');

class Critica extends AppModel {

    public $belongsTo = array(
        'Filme'
    );

    public $validate = array(
        'nome' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Informe o nome'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe um nome com mais de 2 dígitos')
        ),
        'avaliacao' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Informe a avaliação'),
            'range' => array('rule' => array('range', 1, 5), 'message' => 'Informe uma avaliação de 1 á 5')
        ),
        'data_avaliacao' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Informe a data de avaliação'),
            'date' => array('rule' => array('date', 'dmy'), 'message' => 'Data de avaliação inválida'),
            'anoMaiorIgualFilme' => array('rule' => 'anoMaiorIgualFilme', 'message' => 'Ano de avaliação deve ser igual ou superior ao ano do Filme'),
        )
    );

    public function anoMaiorIgualFilme($checked) {
        $anoMaiorIgualFilme = true;
        $data = array_values($checked);
        if (!empty($data) && $this->data['Critica']['filme_id']) {
            $filmeAno = $this->Filme->field('ano', array('Filme.id' => $this->data['Critica']['filme_id']));
            $ano = substr($data[0], 6, 4);
            $anoMaiorIgualFilme = $ano >= $filmeAno;
        }

        return $anoMaiorIgualFilme;
    }

    public function beforeSave($options = array()) {
        $continue = true;
        if (!empty($this->data['Critica']['data_avaliacao'])) {
            $data = str_replace('/', '-', $this->data['Critica']['data_avaliacao']);
            $this->data['Critica']['data_avaliacao'] = date('Y-m-d', strtotime($data));
        }

        return $continue;
    }


}
?>