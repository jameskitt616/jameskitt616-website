<?php

declare(strict_types=1);

namespace App\Blog\Infrastructure\Repository;

use App\Blog\Domain\Entity\Content;
use App\Blog\Domain\Entity\Post;
use App\Blog\Domain\Repository\ContentRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrineContentRepository extends ServiceEntityRepository implements ContentRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findContentsById(string $contentId): Content
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('content')
            ->from(Content::class, 'content')
            ->where('content.id = :id')
            ->setParameter('id', $contentId);

        return $qb->getQuery()->getSingleResult();
    }

    public function save(Content $content): void
    {
        $this->_em->persist($content);
        $this->_em->flush();
    }

    public function delete(Content $content): void
    {
        $this->_em->remove($content);
        $this->_em->flush();
    }
}
