<?php

declare(strict_types = 1);

namespace App\Blog\Domain\Repository;

use App\Blog\Domain\Entity\Post;

interface PostRepository
{
    /**
     * @return array|Post[]
     */
    public function findAllPosts(): array;

    /**
     * @param string $slug
     *
     * @return Post|null
     */
    public function findPostBySlug(string $slug): ?Post;

    public function save(Post $post): void;
}
