<?php
// use Zend\Expressive\AppFactory;
// use Zend\ServiceManager\Config;
// use Zend\ServiceManager\ServiceManager;
// use Zend\Expressive\Router\ZendRouter;

// chdir(dirname(__DIR__));
// require 'vendor/autoload.php';


// // Config
// $config = [
//     'dependencies' => []
// ];

// // Router
// $router = new ZendRouter();

// // Build container
// $container = new ServiceManager();
// (new Config($config['dependencies']))->configureServiceManager($container);

// // Build app
// $app = AppFactory::create($container, $router);

// $app->get('/', function ($request, $response, $next) {
//     $response->getBody()->write('Hello, world!');
//     return $response;
// });

// $app->pipeRoutingMiddleware();
// $app->pipeDispatchMiddleware();
// $app->run();


// Delegate static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server'
    && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
) {
    return false;
}

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

/** @var \Interop\Container\ContainerInterface $container */
$container = require 'config/container.php';

/** @var \Zend\Expressive\Application $app */
$app = $container->get('Zend\Expressive\Application');
$app->run();
