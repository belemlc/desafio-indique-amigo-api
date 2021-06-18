<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Indicacao\IndicacaoCreateHandler;
use Psr\Container\ContainerInterface;

class IndicacaoCreateHandlerFactory
{
    public function __invoke(ContainerInterface $container): IndicacaoCreateHandler
    {
        return new IndicacaoCreateHandler($container);
    }
}