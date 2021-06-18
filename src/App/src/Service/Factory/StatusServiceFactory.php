<?php

declare(strict_types=1);

namespace App\Service\Factory;


use App\Service\StatusService;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class StatusServiceFactory
{
    public function __invoke(ContainerInterface $container): StatusService
    {
        $em = $container->get(EntityManager::class);
        return new StatusService($em);
    }
}