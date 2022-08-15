<?php

namespace App\Blog\Application\Command;

use App\Blog\Domain\Entity\Post;
use App\Command;

class UpdatePost implements Command
{
    public string $title;

    public string $url;

    public Post $post;

    public function __construct(Post $post)
    {
        $this->title = $post->getTitle();
        $this->url = $post->getSlug();
        $this->post = $post;
    }
}
