<?php

declare(strict_types=1);

namespace App\Handler\Factory;

use App\Handler\Indicacao\IndicacaoListHandler;
use Psr\Container\ContainerInterface;

class IndicacaoListHandlerFactory
{
    public function __invoke(ContainerInterface $container) : IndicacaoListHandler
    {
        return new IndicacaoListHandler($container);
    }
}
