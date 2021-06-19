<?php

declare(strict_types=1);

namespace App\Handler\Indicacao;

use App\Handler\HandlerAbstract;
use App\Service\IndicacaoService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class IndicacaoDeleteHandler
 * @package App\Handler\Indicacao
 */
class IndicacaoDeleteHandler extends HandlerAbstract implements RequestHandlerInterface
{

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $id = (int)$request->getAttribute('id');

            $service = $this->container->get(IndicacaoService::class);
            $service->delete($id);

            $response = $this->successResponse([
                'message' => 'Indicacao excluída com sucesso.'
            ]);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Não foi possível excluir a indicação.',
                400
            );
        }

        return $response;
    }
}