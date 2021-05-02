<?php

declare(strict_types = 1);

namespace App\Blog\Infrastructure\Repository;

use App\Blog\Domain\Entity\Post;
use App\Blog\Domain\Repository\PostRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrinePostRepository extends ServiceEntityRepository implements PostRepository
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
            ->orderBy('post.createdAt', 'DESC');

        return $qb->getQuery()->getResult();
    }

    public function save(Post $post): void
    {
        $this->_em->persist($post);
        $this->_em->flush();
    }

    public function delete(Post $post): void
    {
        $this->_em->remove($post);
        $this->_em->flush();
    }
}
