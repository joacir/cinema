<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Ator;
use Authorization\IdentityInterface;

/**
 * Ator policy
 */
class AtorPolicy
{
    /**
     * Check if $user can index Ator
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Ator $ator
     * @return bool
     */
    public function canIndex(IdentityInterface $user, Ator $ator)
    {
        return true;
    }

    /**
     * Check if $user can create Ator
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Ator $ator
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Ator $ator)
    {
        return true;
    }

    /**
     * Check if $user can update Ator
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Ator $ator
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Ator $ator)
    {
        return true;
    }

    /**
     * Check if $user can delete Ator
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Ator $ator
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Ator $ator)
    {
        return true;
    }

    /**
     * Check if $user can view Ator
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Ator $ator
     * @return bool
     */
    public function canView(IdentityInterface $user, Ator $ator)
    {
        return true;
    }

    /**
     * Check if $user can report Ator
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Ator $ator
     * @return bool
     */
    public function canReport(IdentityInterface $user, Ator $ator)
    {
        return true;
    }
}
