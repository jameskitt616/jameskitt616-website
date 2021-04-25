<?php

declare(strict_types = 1);

namespace App\Blog\Domain\Repository;

use App\Blog\Domain\Entity\Post;

interface BlogRepository
{
    /**
     * @return array|Post[]
     */
    public function findAllPosts(): array;

    public function save(Post $post): void;
}
