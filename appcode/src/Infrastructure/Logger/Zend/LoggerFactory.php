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

namespace Infrastructure\Logger\Zend;

use Interop\Container\ContainerInterface;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream;

/**
 * Zend Logger Factory
 * @see  https://github.com/zendframework/zend-log/blob/master/doc/book/psr3.md
 */
class LoggerFactory
{
    /**
     * @param ContainerInterface $container
     * @return \Zend\Log\PsrLoggerAdapter
     */
    public function __invoke(ContainerInterface $container)
    {
        $logger = new Logger();
        $logger->addWriter(
            new Stream('./data/log/application.log')
        );

        $adapter = new \Zend\Log\PsrLoggerAdapter($logger);

        return $adapter;
    }
}
