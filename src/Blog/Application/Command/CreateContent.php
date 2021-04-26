<?php

namespace App\Blog\Application\Command;

use App\Command;

class CreateContent implements Command
{
    /**
     * @var string
     */
    public string $text;
}
