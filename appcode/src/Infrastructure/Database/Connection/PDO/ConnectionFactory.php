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
