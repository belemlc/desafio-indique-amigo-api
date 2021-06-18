<?php

declare(strict_types=1);

namespace App;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'invokables' => [
                Handler\PingHandler::class => Handler\PingHandler::class,
            ],
            'factories'  => [
                Handler\HomePageHandler::class => Handler\HomePageHandlerFactory::class,

                // Handler Status
                Handler\Status\StatusListHandler::class => Handler\Factory\StatusListHandlerFactory::class,

                // Handler Indicacao
                Handler\Indicacao\IndicacaoListHandler::class => Handler\Factory\IndicacaoListHandlerFactory::class,
                Handler\Indicacao\IndicacaoCreateHandler::class => Handler\Factory\IndicacaoCreateHandlerFactory::class,
                Handler\Indicacao\IndicacaoEditHandler::class => Handler\Factory\IndicacaoEditHandlerFactory::class,
                Handler\Indicacao\IndicacaoDeleteHandler::class => Handler\Factory\IndicacaoDeleteHandlerFactory::class,

                //Registrando Serviços
                Service\StatusService::class => Service\Factory\StatusServiceFactory::class,
                Service\IndicacaoService::class => Service\Factory\IndicacaoServiceFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates() : array
    {
        return [
            'paths' => [
                'app'    => [__DIR__ . '/../templates/app'],
                'error'  => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }
}
