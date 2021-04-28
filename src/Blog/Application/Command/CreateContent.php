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
    public ?string $text;

    /**
     * @var string|null
     */
    public ?string $title;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
