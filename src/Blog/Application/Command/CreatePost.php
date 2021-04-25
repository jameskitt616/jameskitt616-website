<?php

namespace App\Blog\Application\Command;

use App\Command;

class CreatePost implements Command
{
    /**
     * @var string
     */
    public string $title;
}
