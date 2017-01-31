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

use Application\Session\CreateSessionCommand;

/**
 * Class Session Middleware
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Session
{
    /**
     * @var League\Tactician\CommandBus $bus
     */
    private $bus;

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
     * @todo Use command bus, command and handler
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $this->bus->handle(
            CreateSessionCommand::fromRequest($request)
        );

        return $next($request, $response);
    }
}
