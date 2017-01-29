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

use Interop\Container\ContainerInterface;
use Interop\Container\Exception;
use League\Tactician\CommandBus;

/**
 * Class DashboardFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class DashboardFactory
{
    /**
     * @param ContainerInterface $container
     * @return Dashboard
     */
    public function __invoke(ContainerInterface $container)
    {
        if (!$container->has(CommandBus::class)) {
            throw new \Exception("CommandBus is not configured");
        }

        $bus = $container->get(CommandBus::class);

        return new Dashboard($bus);
    }
}
