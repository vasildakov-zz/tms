<?php
// https://zendframework.github.io/zend-session/manager/
// http://stackoverflow.com/questions/8990195/how-to-use-zend-session-in-zf2
// http://stackoverflow.com/questions/20456500/zf2-get-global-session-container


use Zend\Session\Config\StandardConfig;
use Zend\Session\SessionManager;
use Zend\Session\Container;

$config = new StandardConfig();
$config->setOptions([
    'remember_me_seconds' => 1800,
    'name'                => 'zf2',
]);

$manager = new SessionManager($config);

$container = new Container('namespace');
$container->bar = 'foo';
