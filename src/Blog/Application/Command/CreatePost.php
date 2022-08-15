<?php

declare(strict_types=1);

namespace App\Blog\Application\Command;

use App\Command;

class CreatePost implements Command
{
    public string $title;
    public string $url;
}
