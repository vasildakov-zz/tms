<?php declare(strict_types = 1);
/**
 * This file is part of the vasildakov/tms project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @link https://github.com/vasildakov/tms GitHub
 */

namespace Presentation\Ui\Middleware;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use League\Tactician\CommandBus;

use Zend\Session\Config\StandardConfig;
use Zend\Session\SessionManager;
use Zend\Session\Container;

/**
 * Class Session
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Session
{
    /**
     * @todo Use command bus, command and handler
     * @param Zend\Session\Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }


    /**
     * @todo Use command bus, command and handler
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $host = $request->getUri()->getHost();

        $subdomain = explode('.', $host)[0];

        // 1) get the subdomain

        // 2) check if the client is exist

        // 3) check if the session is exist

        // 4) create a session if does not exist

        $this->container->offsetSet('customer', $subdomain);

        return $next($request, $response);
    }
}
