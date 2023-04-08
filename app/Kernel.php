<?php

declare(strict_types=1);
namespace App;

use Spatie\Ignition\Ignition;

class Kernel
{
    public function register(): void
    {
        Ignition::make()->applicationPath(ROOT_PATH)->register();
    }
}
