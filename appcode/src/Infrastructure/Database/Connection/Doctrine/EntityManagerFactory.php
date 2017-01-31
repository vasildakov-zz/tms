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

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\ArrayCache;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\XmlDriver;
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
        /**
         * @todo Get doctrine configuration from the session storage
         */
        $doctrineConfig = $container->has('config') ? $container->get('config')['doctrine'] : [];


        $configuration = new Configuration();
        $configuration->setAutoGenerateProxyClasses(true);
        $configuration->setProxyDir('data/doctrine/proxies');
        $configuration->setProxyNamespace('Domain\Entity');

        $configuration->setMetadataDriverImpl(
            new XmlDriver([
                __DIR__ . '/../../Persistence/Doctrine/Mapping'
            ])
        );

        $configuration->setNamingStrategy(new UnderscoreNamingStrategy());
        $configuration->setQueryCacheImpl(new ArrayCache());
        $configuration->setMetadataCacheImpl(new ArrayCache());


        // Cache
        // $cache = $container->get(\Doctrine\Common\Cache\Cache::class);
        // $configuration->setQueryCacheImpl($cache);
        // $configuration->setResultCacheImpl($cache);
        // $configuration->setMetadataCacheImpl($cache);

        
        // data from the session
        $db = [
            'driver'   => 'pdo_mysql',
            'host'     => 'mysql',
            'port'     => '3306',
            'dbname'   => 'tms',
            'user'     => 'root',
            'password' => '1',
            'charset'  => 'UTF8',
        ];

        $connection = DriverManager::getConnection($db);

        $entityManager =  EntityManager::create($connection, $configuration);

        // Add custom types to map ValueObjects correctly
        // if (!\Doctrine\DBAL\Types\Type::hasType('isbn')) {
        //      \Doctrine\DBAL\Types\Type::addType('isbn', IsbnType::class);
        //     $entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('isbn', 'isbn');
        // }

        return $entityManager;
    }
}
