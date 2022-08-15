<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Repository;

use App\Blog\Domain\Entity\Post;
use App\Security\Domain\Entity\User;
use App\Security\Domain\Repository\UserRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrineUserRepository extends ServiceEntityRepository implements UserRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findByEmail(string $email): ?User
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('user')
            ->from(User::class, 'user')
            ->where('user.email = :email')
            ->setParameter('email', $email);

        return $qb->getQuery()->getOneOrNullResult();
    }
}
