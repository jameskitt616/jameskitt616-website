<?php

namespace App\Blog\Application\Command;

use App\Blog\Domain\Entity\Post;
use App\Command;

class UpdatePost implements Command
{
    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $url;

    /**
     * @var Post $post
     */
    public Post $post;

    public function __construct(Post $post)
    {
        $this->title = $post->getTitle();
        $this->url = $post->getSlug();
        $this->post = $post;
    }
}
