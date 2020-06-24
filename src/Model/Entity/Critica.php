<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Critica Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property int|null $avaliacao
 * @property \Cake\I18n\FrozenTime|null $data_avaliacao
 * @property int|null $filme_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\Filme $filme
 */
class Critica extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'avaliacao' => true,
        'data_avaliacao' => true,
        'filme_id' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'filme' => true,
    ];

}
