<?php

namespace Application\Action;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;

class PingAction
{
    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        return new JsonResponse(['ack' => time()]);
    }
}
