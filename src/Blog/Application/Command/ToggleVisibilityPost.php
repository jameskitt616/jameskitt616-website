<?php

namespace App\Blog\Application\Command;

use App\Blog\Domain\Entity\Content;
use App\Blog\Domain\Entity\Post;
use App\Command;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ToggleVisibilityPost implements Command
{
    /**
     * @var Post $post
     */
    public Post $post;

    /**
     * @var bool $visibility
     */
    public bool $visibility;

    public function __construct(Post $post, bool $visibility)
    {
        $this->post = $post;
        $this->visibility = $visibility;
    }
}
