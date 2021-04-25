<?php

declare(strict_types = 1);

namespace App\Blog\Infrastructure\Repository;

use App\Blog\Domain\Entity\Post;
use App\Blog\Domain\Repository\BlogRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrineBlogRepository extends ServiceEntityRepository implements BlogRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findAllPosts(): array
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('post')
            ->from(Post::class, 'post')
            ->orderBy('post.creationDate', 'ASC');

        return $qb->getQuery()->getResult();
    }
}
