<?php
/**
 * CLI Base
 * @package cli
 * @version 0.0.1
 */

return [
    '__name' => 'cli',
    '__version' => '0.0.2',
    '__git' => 'git@github.com:getphun/cli.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/cli' => ['install', 'update', 'remove'],
        'mim' => ['install', 'update', 'remove']
    ],
    '__dependencies' => [
        'required' => [
            'core' => true
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'Cli\\Server' => [
                'type' => 'file',
                'base' => 'modules/cli/server'
            ],
            'Cli\\Controller' => [
                'type' => 'file',
                'base' => 'modules/cli/system/Controller.php',
                'children' => 'modules/cli/controller'
            ],
            'Cli\\Library' => [
                'type' => 'file',
                'base' => 'modules/cli/library',
            ]
        ]
    ],
    'gates' => [
        'tool' => [
            'priority' => 2000,
            'host' => [
                'value' => 'CLI'
            ],
            'path' => [
                'value' => ''
            ]
        ]
    ],
    'routes' => [
        'tool' => [
            '404' => [
                'handler' => 'Cli\\Controller::show404'
            ],
            '500' => [
                'handler' => 'Cli\\Controller::show500'
            ],
            'toolHelp' => [
                'info' => 'Show this information',
                'path' => [
                    'value' => 'help'
                ],
                'handler' => 'Cli\\Controller\\Tool::help'
            ],
            'toolServer' => [
                'info' => 'Test server installation',
                'path' => [
                    'value' => 'server'
                ],
                'handler' => 'Cli\\Controller\\Tool::server'
            ],
            'toolVersion' => [
                'info' => 'Show installed tools version',
                'path' => [
                    'value' => 'version'
                ],
                'handler' => 'Cli\\Controller\\Tool::version'
            ]
        ]
    ],
    'server' => [
        'cli' => [
            'Readline' => 'Cli\\Server\\PHP::readline'
        ]
    ]
];