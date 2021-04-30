<?php

namespace App\Blog\Application\Command;

use App\Blog\Domain\Entity\Content;
use App\Blog\Domain\Entity\Post;
use App\Command;

class DeleteContent implements Command
{
    /**
     * @var Content $content
     */
    public Content $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }
}
