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
            $result = $service->getAll();
            $response = $this->successResponse($result);
        } catch (\Throwable $e) {
            $response = $this->errorResponse(
                $e,
                'Não foi possível listar o status.',
                400
            );
        }

        return $response;
    }
}
