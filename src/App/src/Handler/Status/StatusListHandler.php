<?php

declare(strict_types=1);

namespace App\Handler\Status;

use App\Handler\HandlerAbstract;
use App\Service\StatusService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class StatusListHandler extends HandlerAbstract implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        try {
            $service = $this->container->get(StatusService::class);
            $resultWithDQL = $service->getAll();
            $response = $this->successResponse(['data' => $resultWithDQL]);
        } catch (\Throwable $e) {
            $response = $this->errorResponse(
                $e,
                'Error trying to list the Indicação.',
                400
            );
        }

        return $response;
    }
}
