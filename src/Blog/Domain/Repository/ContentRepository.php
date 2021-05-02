<?php

declare(strict_types = 1);

namespace App\Blog\Domain\Repository;

use App\Blog\Domain\Entity\Content;

interface ContentRepository
{
    /**
     * @param string $contentId
     *
     * @return Content
     */
    public function findContentsById(string $contentId): Content;

    /**
     * @return array|Content[]
     */
    public function findContentsByPostId(string $postId): array;

    public function save(Content $content): void;

    public function delete(Content $content): void;
}
