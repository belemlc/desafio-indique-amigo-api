<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Status\StatusListHandler;
use Psr\Container\ContainerInterface;

class StatusListHandlerFactory
{
    public function __invoke(ContainerInterface $container) : StatusListHandler
    {
        return new StatusListHandler($container);
    }
}
