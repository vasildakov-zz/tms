<?php

namespace Presentation\Ui\Dashboard;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;

class Dashboard
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        //
    }


    /**
     * [__invoke description]
     * @param  Request       $request  [description]
     * @param  Response      $response [description]
     * @param  callable|null $next     [description]
     * @return [type]                  [description]
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $host = $request->getUri()->getHost();

        $subdomain = explode('.', $host)[0];

        return new JsonResponse([
            'subdomain' => $subdomain
        ]);
    }
}
