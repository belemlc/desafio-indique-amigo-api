<?php

declare(strict_types=1);

namespace App\Handler\Indicacao;

use App\Handler\HandlerAbstract;
use App\Service\IndicacaoService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class IndicacaoListHandler
 * @package App\Handler\Indicacao
 */
class IndicacaoListHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        try {
            $service = $this->container->get(IndicacaoService::class);
            $data = $service->getAll();

            $response = $this->successResponse($data);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Não foi possível listar as indicações.',
                400
            );
        }

        return $response;
    }
}
