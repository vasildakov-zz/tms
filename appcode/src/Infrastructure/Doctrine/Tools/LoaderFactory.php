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

namespace Infrastructure\Doctrine\Tools;

use Doctrine\Common\DataFixtures\Loader;
use Interop\Container\ContainerInterface;

/**
 * Class LoaderFactory
 */
class LoaderFactory
{
    /**
     * @param   ContainerInterface   $container
     * @return  \Doctrine\Common\DataFixtures\Loader
     */
    public function __invoke(ContainerInterface $container)
    {
        // ok
        return new Loader();
    }
}
