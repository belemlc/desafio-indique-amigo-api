<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Indicacao\IndicacaoEditHandler;
use Psr\Container\ContainerInterface;

class IndicacaoEditHandlerFactory
{
    public function __invoke(ContainerInterface $container): IndicacaoEditHandler
    {
        return new IndicacaoEditHandler($container);
    }
}