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

namespace Application\Ping;

use Interop\Container\ContainerInterface;

/**
 * Class PingHandlerFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingHandlerFactory
{
    /**
     * @param  ContainerInterface $container
     * @return Ping
     */
    public function __invoke(ContainerInterface $container)
    {
        $logger = $container->get(\Monolog\Logger::class);

        return new PingHandler($logger);
    }
}
