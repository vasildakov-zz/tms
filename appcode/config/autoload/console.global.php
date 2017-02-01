<?php // config/autoload/console.global.php

return [
    'dependencies' => [
        'invokables' => [
        ],
        'factories' => [
            Presentation\Cli\Command\ImportCommand::class => Presentation\Cli\Command\ImportCommandFactory::class,
        ],
    ],
    'console' => [
        'commands' => [
            Presentation\Cli\Command\ImportCommand::class,
        ],
    ],
];
