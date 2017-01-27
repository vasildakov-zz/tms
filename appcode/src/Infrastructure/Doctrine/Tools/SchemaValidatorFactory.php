<?php declare(strict_types = 1);

namespace Infrastructure\Doctrine\Tools;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\Tools\SchemaValidator;

class SchemaValidatorFactory
{
    /**
     * @param ContainerInterface $container
     * @return Doctrine\ORM\Tools\SchemaValidator
     */
    public function __invoke(ContainerInterface $container)
    {
        $em = $container->get('doctrine.entity_manager.orm_default');

        return new SchemaValidator($em);
    }
}
