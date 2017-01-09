<?php // cli.php

require __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\EntityManager;

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Symfony\Component\Console\Application;

/** @var \Interop\Container\ContainerInterface $container */
$container = require __DIR__ . '/config/container.php';

$config = $container->get('config');

/** @var \Symfony\Component\Console\Application $cli */
$cli = new Application('Command Line Interface', 1.0);

$cli->run();
