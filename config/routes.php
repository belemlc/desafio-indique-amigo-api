<?php

declare(strict_types=1);

use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use Psr\Container\ContainerInterface;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/:id', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Mezzio\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    $app->get('/', App\Handler\HomePageHandler::class, 'home');
    $app->get('/api/ping', App\Handler\PingHandler::class, 'api.ping');
    
    // Status
    $app->get('/api/status', App\Handler\Status\StatusListHandler::class, 'api.status.index');

    // Indicacao
    $app->get('/api/indicacao', App\Handler\Indicacao\IndicacaoListHandler::class, 'api.indicacao.index');
    $app->post('/api/indicacao', App\Handler\Indicacao\IndicacaoCreateHandler::class, 'api.indicacao.create');
    $app->put('/api/indicacao/{id}', App\Handler\Indicacao\IndicacaoEditHandler::class, 'api.indicacao.update');
    $app->delete('/api/indicacao/{id}', App\Handler\Indicacao\IndicacaoDeleteHandler::class, 'api.indicacao.delete');

};
