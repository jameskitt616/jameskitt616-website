<?php

declare(strict_types=1);

namespace App;

interface CommandBus
{
    public function handle(Command $command): void;
}
