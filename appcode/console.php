<?php // cli.php

require __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\EntityManager;

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Symfony\Component\Console\Application;

/** @var \Interop\Container\ContainerInterface $container */
$container = require __DIR__ . '/config/container.php';

$config = $container->get('config');

/** @var \Symfony\Component\Console\Application $cli */
$cli = new Application('TMS Command Line Interface', 1.0);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet([
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper(
        $container->get('doctrine.entity_manager.orm_default')
    ),
]);

$cli->setHelperSet($helperSet);
$cli->run();
