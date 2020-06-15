<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $login
 * @property string|null $senha
 * @property int|null $aro_parent_id
 *
 * @property \App\Model\Entity\AroParent $aro_parent
 */
class Usuario extends Entity
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
        'login' => true,
        'senha' => true,
        'aro_parent_id' => true,
        'aro_parent' => true,
    ];
}
