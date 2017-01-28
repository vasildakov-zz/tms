<?php declare(strict_types=1);
/**
 * This file is part of the vasildakov/tms project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @link https://github.com/vasildakov/tms GitHub
 */

namespace Infrastructure\Database\Connection\DBAL;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Driver\Connection;
use Interop\Container\ContainerInterface;

class ConnectionFactory
{
    /**
     * @param  ContainerInterface $container
     * @return Doctrine\DBAL\Driver\Connection
     */
    public function __invoke(ContainerInterface $container) : Connection
    {
        if (!$container->has('config')) {
            throw new \InvalidArgumentException('Missing configuration service');
        }

        $config = $container->get('config');

        if (!array_key_exists('db', $config)) {
            throw new \InvalidArgumentException('Missing database configuration');
        }

        return DriverManager::getConnection($config['db']);
    }
}
