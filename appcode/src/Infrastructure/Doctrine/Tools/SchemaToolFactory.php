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

use Interop\Container\ContainerInterface;
use Doctrine\ORM\Tools\SchemaTool;

class SchemaToolFactory
{
    /**
     * @param ContainerInterface $container
     * @return Doctrine\ORM\Tools\SchemaTool
     */
    public function __invoke(ContainerInterface $container)
    {
        $em = $container->get('doctrine.entity_manager.orm_default');

        return new SchemaTool($em);
    }
}
