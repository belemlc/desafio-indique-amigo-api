<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Indicacao\IndicacaoDeleteHandler;
use Psr\Container\ContainerInterface;

class IndicacaoDeleteHandlerFactory
{
    public function __invoke(ContainerInterface $container): IndicacaoDeleteHandler
    {
        return new IndicacaoDeleteHandler($container);
    }
}