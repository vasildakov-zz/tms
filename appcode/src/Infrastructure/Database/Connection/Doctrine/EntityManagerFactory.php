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

namespace Infrastructure\Database\Connection\Doctrine;

use Doctrine\DBAL\Types\Type;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Cache\Cache;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Interop\Container\ContainerInterface;

class EntityManagerFactory
{
    /**
     * @param  ContainerInterface $container
     * @return EntityManager
     */
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->has('config') ? $container->get('config') : [];

        $config = $config['doctrine'];

        $proxyDir = 'data/DoctrineORM/Proxy';

        $proxyNamespace = 'DoctrineORM/Proxy';

        $autoGenerateProxyClasses = true;

        $underscoreNamingStrategy = false;

        // Doctrine ORM
        $configuration = new Configuration();
        $configuration->setProxyDir($proxyDir);
        $configuration->setProxyNamespace($proxyNamespace);
        $configuration->setAutoGenerateProxyClasses($autoGenerateProxyClasses);

        // Naming Strategy
        if ($underscoreNamingStrategy) {
            $configuration->setNamingStrategy(new UnderscoreNamingStrategy());
        }

        // ORM mapping by Annotation
        //AnnotationRegistry::registerAutoloadNamespace($config['driver']['annotations']['class']);
        AnnotationRegistry::registerFile(
            'vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
        );

        $driver = new AnnotationDriver(
            new AnnotationReader(),
            $config['driver']['annotations']['paths']
        );

        $configuration->setMetadataDriverImpl($driver);

        // Cache
        // $cache = $container->get(\Doctrine\Common\Cache\Cache::class);
        // $configuration->setQueryCacheImpl($cache);
        // $configuration->setResultCacheImpl($cache);
        // $configuration->setMetadataCacheImpl($cache);

        // EntityManager
        return EntityManager::create($config['connection']['orm_default']['params'], $configuration);
    }
}
