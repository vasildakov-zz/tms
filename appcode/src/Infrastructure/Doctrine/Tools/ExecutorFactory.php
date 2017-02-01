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

use Doctrine\ORM\EntityManager;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

use Interop\Container\ContainerInterface;

/**
 * Class ExecutorFactory
 */
class ExecutorFactory
{
    /**
     * @param   ContainerInterface   $container
     * @return  \Doctrine\Common\DataFixtures\Executor\ORMExecutor
     */
    public function __invoke(ContainerInterface $container)
    {
        // ok
        $em = $container->get('doctrine.entity_manager.orm_default');
        $purger = $container->get(ORMPurger::class);

        return new ORMExecutor($em, $purger);
    }
}
