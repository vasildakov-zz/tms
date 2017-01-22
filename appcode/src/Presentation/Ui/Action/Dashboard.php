<?php declare(strict_types = 1);

namespace Presentation\Ui\Action;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use League\Tactician\CommandBus;

/**
 * Class Dashboard
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Dashboard
{
    /**
     * Constructor
     *
     * @param League\Tactician\CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }


    /**
     * @param  Request       $request
     * @param  Response      $response
     * @param  callable|null $next
     * @return
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $host = $request->getUri()->getHost();

        $subdomain = explode('.', $host)[0];

        return new JsonResponse(['subdomain' => $subdomain]);
    }
}
