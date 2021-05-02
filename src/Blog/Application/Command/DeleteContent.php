<?php

namespace App\Blog\Application\Command;

use App\Command;

class DeleteContent implements Command
{
    public string $contentId;

    public function __construct(string $contentId)
    {
        $this->contentId = $contentId;
    }
}
