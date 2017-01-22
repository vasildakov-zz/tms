<?php declare(strict_types=1);

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
        $doctrine = new Configuration();
        $doctrine->setProxyDir($proxyDir);
        $doctrine->setProxyNamespace($proxyNamespace);
        $doctrine->setAutoGenerateProxyClasses($autoGenerateProxyClasses);

        // Naming Strategy
        if ($underscoreNamingStrategy) {
            $doctrine->setNamingStrategy(new UnderscoreNamingStrategy());
        }

        // ORM mapping by Annotation
        //AnnotationRegistry::registerAutoloadNamespace($config['driver']['annotations']['class']);
        AnnotationRegistry::registerFile('vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
        
        $driver = new AnnotationDriver(
            new AnnotationReader(),
            $config['driver']['annotations']['paths']
        );

        $doctrine->setMetadataDriverImpl($driver);

        // Cache
        // $cache = $container->get(\Doctrine\Common\Cache\Cache::class);
        // $doctrine->setQueryCacheImpl($cache);
        // $doctrine->setResultCacheImpl($cache);
        // $doctrine->setMetadataCacheImpl($cache);

        // EntityManager
        return EntityManager::create($config['connection']['orm_default']['params'], $doctrine);
    }
}
