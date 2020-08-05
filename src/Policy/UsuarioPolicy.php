<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Usuario;
use Authorization\IdentityInterface;

/**
 * Usuario policy
 */
class UsuarioPolicy
{
    /**
     * Check if $user can create Usuario
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Usuario $usuario
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Usuario $usuario)
    {
        return true;
    }

    /**
     * Check if $user can update Usuario
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Usuario $usuario
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Usuario $usuario)
    {
        return true;
    }

    /**
     * Check if $user can delete Usuario
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Usuario $usuario
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Usuario $usuario)
    {
        return true;
    }

    /**
     * Check if $user can view Usuario
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Usuario $usuario
     * @return bool
     */
    public function canView(IdentityInterface $user, Usuario $usuario)
    {
        return true;
    }

    /**
     * Check if $user can index Usuario
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Usuario $usuario
     * @return bool
     */
    public function canIndex(IdentityInterface $user, Usuario $usuario)
    {
        return true;
    }

    /**
     * Check if $user can report Usuario
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Usuario $usuario
     * @return bool
     */
    public function canReport(IdentityInterface $user, Usuario $usuario)
    {
        return true;
    }
}
