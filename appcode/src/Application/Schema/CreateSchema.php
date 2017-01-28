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

namespace Application\Schema;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;

/**
 * CreateSchema Handler
 *
 * Create schema for new client
 */
final class CreateSchema implements CreateSchemaInterface
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @param Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param  CreateSchemaCommand $command
     * @return boolean
     */
    public function __invoke(CreateSchemaCommand $command): bool
    {
        // create new entity manager
        // Doctrine\DBAL\Connection
        // Doctrine\ORM\Configuration
        // Doctrine\Common\EventManager
        // $em = new EntityManager($connection, $configuration, $eventManager);

        // find classes
        $classes = [
            $this->em->getClassMetadata(\Domain\Entity\Customer::class),
            $this->em->getClassMetadata(\Domain\Entity\Payment::class),
        ];

        // create new doctrine orm schema tool
        $tool = new \Doctrine\ORM\Tools\SchemaTool($this->em);

        // create new schema
        $tool->createSchema($classes);
    }
}
