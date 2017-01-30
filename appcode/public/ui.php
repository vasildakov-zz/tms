<?php

use Zend\Stdlib\ArrayObject;
use Zend\Stdlib\ArrayUtils;
use Zend\Stdlib\Glob;

use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

use Zend\Expressive\ConfigManager\ConfigManager;
use Zend\Expressive\ConfigManager\PhpFileProvider;

// Delegate static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server'
    && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
) {
    return false;
}

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

/** @var \Zend\Expressive\ConfigManager\ConfigManager $configManager */
$configManager = new ConfigManager([
    function () {
        return [ConfigManager::ENABLE_CACHE => true];
    },
    Presentation\Ui\ModuleConfig::class,
    new PhpFileProvider('config/autoload/{{,*.}global,{,*.}local}.php'),
]);

/** @var \Zend\Stdlib\ArrayObject $config */
$config = new ArrayObject($configManager->getMergedConfig());


/** @var \Interop\Container\ContainerInterface $container */
$container = new ServiceManager();
(new Config($config['dependencies']))->configureServiceManager($container);

// Inject config
$container->setService('config', $config);

/** @var \Zend\Expressive\Application $app */
$app = $container->get(Zend\Expressive\Application::class);
$app->run();
