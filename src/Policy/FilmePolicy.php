<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Filme;
use Authorization\IdentityInterface;

/**
 * Filme policy
 */
class FilmePolicy
{
    /**
     * Check if $user can create Filme
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Filme $filme
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Filme $filme)
    {
        return true;
    }

    /**
     * Check if $user can update Filme
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Filme $filme
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Filme $filme)
    {
        return true;
    }

    /**
     * Check if $user can delete Filme
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Filme $filme
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Filme $filme)
    {
        return true;
    }

    /**
     * Check if $user can view Filme
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Filme $filme
     * @return bool
     */
    public function canView(IdentityInterface $user, Filme $filme)
    {
        return true;
    }

    /**
     * Check if $user can index Filme
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Filme $filme
     * @return bool
     */
    public function canIndex(IdentityInterface $user, Filme $filme)
    {
        return true;
    }

    /**
     * Check if $user can report Filme
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Filme $filme
     * @return bool
     */
    public function canReport(IdentityInterface $user, Filme $filme)
    {
        return true;
    }
}
