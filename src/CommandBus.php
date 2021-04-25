<?php

namespace App;

interface CommandBus
{
    public function handle(Command $command): void;
}
