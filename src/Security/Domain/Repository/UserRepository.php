<?php

declare(strict_types=1);

namespace App\Security\Domain\Repository;

use App\Security\Domain\Entity\User;

interface UserRepository
{
    public function findByEmail(string $email): ?User;
}
