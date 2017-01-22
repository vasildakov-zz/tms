<?php declare(strict_types=1);

namespace Infrastructure\Database\Connection\DBAL;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Driver\Connection;
use Interop\Container\ContainerInterface;

class ConnectionFactory
{
    public function __invoke(ContainerInterface $container) : Connection
    {
        $config = $container->get('config');

        $connectionParams = $config['db'];

        return DriverManager::getConnection($connectionParams);
    }
}
