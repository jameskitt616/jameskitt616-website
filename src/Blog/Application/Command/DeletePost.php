<?php

declare(strict_types=1);

namespace App\Blog\Application\Command;

use App\Blog\Domain\Entity\Post;
use App\Command;

class DeletePost implements Command
{
    public Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
