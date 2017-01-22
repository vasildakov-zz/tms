<?php declare(strict_types=1);

namespace Infrastructure\Database\Connection\PDO;

use PDO;
use Interop\Container\ContainerInterface;

class ConnectionFactory
{
    public function __invoke(ContainerInterface $container) : PDO
    {
        $config = $container->get('config');

        $params = $config['db'];

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ];

        return new PDO($dsn, $user, $password, $options);
    }
}
