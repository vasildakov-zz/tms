<?php declare(strict_types=1);

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
