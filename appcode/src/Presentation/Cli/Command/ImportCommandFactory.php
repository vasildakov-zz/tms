<?php

namespace Presentation\Cli\Command;

use Interop\Container\ContainerInterface;

use Doctrine\ORM\EntityManager;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;

class ImportCommandFactory
{
    /**
     * @param  ContainerInterface $container
     * @return ImportCommand
     */
    public function __invoke(ContainerInterface $container)
    {
        // $config = $container->get('config');

        // if (!isset($config['doctrine']['fixtures'])) {
        //     throw new ServiceNotCreatedException('Missing Doctrine configuration');
        // }

        //$em = $container->get(EntityManager::class);
        $em = $container->get('doctrine.entity_manager.orm_default');
        $loader = $container->get(Loader::class);
        $executor = $container->get(ORMExecutor::class);
        $purger = $container->get(ORMPurger::class);

        $command = new ImportCommand($em, $loader, $executor, $purger);
        // $command->setPath($config['doctrine']['fixtures']['paths']);
        $command->setPath([
            'src/Infrastructure/Doctrine/Fixtures'
        ]);

        return $command;
    }
}
