<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Filme Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property int|null $ano
 * @property string|null $duracao
 * @property string|null $idioma
 * @property int|null $genero_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\Genero $genero
 * @property \App\Model\Entity\Critica[] $criticas
 * @property \App\Model\Entity\Ator[] $ators
 */
class Filme extends Entity
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
        'ano' => true,
        'duracao' => true,
        'idioma' => true,
        'genero_id' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'genero' => true,
        'criticas' => true,
        'ators' => true,
    ];
}
