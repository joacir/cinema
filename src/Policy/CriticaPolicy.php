<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Critica;
use Authorization\IdentityInterface;

/**
 * Critica policy
 */
class CriticaPolicy
{
    /**
     * Check if $user can index Critica
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Critica $critica
     * @return bool
     */
    public function canIndex(IdentityInterface $user, Critica $critica)
    {
        return true;
    }

    /**
     * Check if $user can create Critica
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Critica $critica
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Critica $critica)
    {
        return true;
    }

    /**
     * Check if $user can update Critica
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Critica $critica
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Critica $critica)
    {
        return true;
    }

    /**
     * Check if $user can delete Critica
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Critica $critica
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Critica $critica)
    {
        return true;
    }

    /**
     * Check if $user can view Critica
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Critica $critica
     * @return bool
     */
    public function canView(IdentityInterface $user, Critica $critica)
    {
        return true;
    }

    /**
     * Check if $user can report Critica
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Critica $critica
     * @return bool
     */
    public function canReport(IdentityInterface $user, Critica $critica)
    {
        return true;
    }
}
