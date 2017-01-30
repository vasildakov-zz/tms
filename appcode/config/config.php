<?php
/**
 * SaaS Configuration used by ui.php
 */
use Zend\Stdlib\ArrayUtils;
use Zend\Stdlib\Glob;
use Zend\Expressive\ConfigManager\ConfigManager;
use Zend\Expressive\ConfigManager\PhpFileProvider;

$configManager = new ConfigManager([
    Presentation\Ui\ModuleConfig::class,
    new PhpFileProvider('config/autoload/{{,*.}global,{,*.}local}.php'),
]);

return new ArrayObject($configManager->getMergedConfig());

// $cachedConfigFile = './data/cache/saas/app_config.php';

// $config = [];

// if (is_file($cachedConfigFile)) {
//     $config = include $cachedConfigFile;
// } else {
//     foreach (Glob::glob('config/saas/autoload/{{,*.}global,{,*.}local}.php', Glob::GLOB_BRACE) as $file) {
//         $config = ArrayUtils::merge($config, include $file);
//     }

//     if (isset($config['config_cache_enabled']) && $config['config_cache_enabled'] === true) {
//         file_put_contents($cachedConfigFile, '<?php return ' . var_export($config, true) . ';');
//     }
// }


// return new ArrayObject($config, ArrayObject::ARRAY_AS_PROPS);
