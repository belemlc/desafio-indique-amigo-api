<?php

declare(strict_types=1);

namespace App\Handler\Indicacao;

use App\Handler\HandlerAbstract;
use App\Service\IndicacaoService;
use Laminas\Json\Json;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class IndicacaoCreateHandler
 * @package App\Handler\Indicacao
 */
class IndicacaoCreateHandler extends HandlerAbstract implements RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = Json::decode($request->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);
            $service = $this->container->get(IndicacaoService::class);
            $indicacao = $service->insert($data);

            $response = $this->successResponse($indicacao, 201);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Error on create indicacao.',
                400
            );
        }

        return $response;
    }
}