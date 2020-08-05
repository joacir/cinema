<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Genero;
use Authorization\IdentityInterface;

/**
 * Genero policy
 */
class GeneroPolicy
{
    /**
     * Check if $user can create Genero
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Genero $genero
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Genero $genero)
    {
        return true;
    }

    /**
     * Check if $user can update Genero
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Genero $genero
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Genero $genero)
    {
        return true;
    }

    /**
     * Check if $user can delete Genero
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Genero $genero
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Genero $genero)
    {
        return true;
    }

    /**
     * Check if $user can view Genero
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Genero $genero
     * @return bool
     */
    public function canView(IdentityInterface $user, Genero $genero)
    {
        return true;
    }

    /**
     * Check if $user can index Genero
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Genero $genero
     * @return bool
     */
    public function canIndex(IdentityInterface $user, Genero $genero)
    {
        return true;
    }

    /**
     * Check if $user can report Genero
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Genero $genero
     * @return bool
     */
    public function canReport(IdentityInterface $user, Genero $genero)
    {
        return true;
    }
}
