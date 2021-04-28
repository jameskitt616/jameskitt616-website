<?php

namespace App\Blog\Application\Command;

use App\Blog\Domain\Entity\Post;
use App\Command;

class CreateContent implements Command
{
    /**
     * @var Post $post
     */
    public Post $post;

    /**
     * @var string
     */
    public string $text;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
