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
 * Class IndicacaoEditHandler
 * @package App\Handler\Indicacao
 */
class IndicacaoEditHandler extends HandlerAbstract implements RequestHandlerInterface
{

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = Json::decode($request->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);
            $data['id'] = (int)$request->getAttribute('id');

            $service = $this->container->get(IndicacaoService::class);
            $result = $service->update($data);

            $response = $this->successResponse($result);
        } catch (\Exception $e) {
            $response = $this->errorResponse(
                $e,
                'Não foi possível editar a indicação.',
                400
            );
        }

        return $response;
    }
}