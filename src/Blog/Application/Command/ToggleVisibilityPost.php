<?php

namespace App\Blog\Application\Command;

use App\Blog\Domain\Entity\Post;
use App\Command;

class ToggleVisibilityPost implements Command
{
    public Post $post;

    public bool $visibility;

    public function __construct(Post $post, bool $visibility)
    {
        $this->post = $post;
        $this->visibility = $visibility;
    }
}
