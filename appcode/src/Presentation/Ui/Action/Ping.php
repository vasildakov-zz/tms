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

namespace Presentation\Ui\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Zend\Diactoros\Response\JsonResponse;
use League\Tactician\CommandBus;

use Application\Ping\PingCommand;

/**
 * Class Ping
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Ping
{
    /**
     * @var \League\Tactician\CommandBus
     */
    private $bus;

    /**
     * @param \League\Tactician\CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param  Request                $request
     * @param  Response               $response
     * @param  callable|null          $next
     * @return JsonResponse
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $command  = new PingCommand(new \DateTime);
        $this->bus->handle($command);

        return new JsonResponse(['time' => $command->time()], 200);
    }
}
