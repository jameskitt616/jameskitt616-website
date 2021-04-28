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
     * @var string|null
     */
    public ?string $text = null;

    /**
     * @var string|null
     */
    public ?string $title = null;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
