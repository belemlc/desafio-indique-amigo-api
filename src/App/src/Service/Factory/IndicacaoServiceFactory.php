<?php

declare(strict_types=1);

namespace App\Service\Factory;


use App\Service\IndicacaoService;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class IndicacaoServiceFactory
{
    public function __invoke(ContainerInterface $container): IndicacaoService
    {
        $em = $container->get(EntityManager::class);
        return new IndicacaoService($em);
    }
}