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

namespace Infrastructure\Session\Zend;

use Interop\Container\ContainerInterface;
use Zend\Session\Config\SessionConfig;
use Zend\Session\SessionManager;

/**
 * Class SessionManagerFactory
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class SessionManagerFactory
{
    /**
     * @param  ContainerInterface $container
     * @return Ping
     */
    public function __invoke(ContainerInterface $container) : SessionManager
    {
        $config = new SessionConfig();

        $config->setOptions(
            [
                'name' => 'name',
                'phpSaveHandler' => 'redis',
                'savePath' => 'tcp://127.0.0.1:6379?weight=1&timeout=1',
                'use_cookies' => false,
            ]
        );

        return new SessionManager($config);
    }
}
