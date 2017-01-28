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

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use League\Tactician\CommandBus;

/**
 * Class Login
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Login
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
        return new JsonResponse();
    }
}
