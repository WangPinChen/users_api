<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
        '@v1' => '@app/modules/v1'
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // uncomment if you want to cache RBAC items hierarchy
            'cache' => 'cache',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'coreDb' => [
            'class' => 'yii\db\Connection',
            'dsn' => $params['coreDb']['dsn'],
            'username' => $params['coreDb']['username'],
            'password' => $params['coreDb']['password'],
            'charset' => 'utf8mb4',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => $params['db']['dsn'],
            'username' => $params['db']['username'],
            'password' => $params['db']['password'],
            'charset' => 'utf8mb4',
        ],
        'oldDb' => [
            'class' => 'yii\db\Connection',
            'dsn' => $params['oldDb']['dsn'],
            'username' => $params['oldDb']['username'],
            'password' => $params['oldDb']['password'],
            'charset' => 'utf8mb4',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'AtelliTech\Yii2\Utils\Log\JsonFileLogTarget',
                    'levels' => ['error', 'warning'],
                    'enableRotation' => false,
                    'logFile' => '@runtime/logs/cli.log'
                ],
            ],
        ],
        'postal' => [
            'class' => 'AtelliTech\Yii2\Postal',
            'host' => $params['postal']['host'],
            'key' => $params['postal']['host']
        ],
    ],
    'params' => &$params,
    'controllerMap' => [
        'genmodel' => [
            'class' => 'AtelliTech\Yii2\Utils\ModelGeneratorController',
            'db' => 'db', // db comopnent id default: db
            'path' => '@app/models', // store path of model class file default: @app/models
            'namespace' => 'app\models', // namespace of model class default: app\models
        ],
        'genapi' => [
            'class' => 'AtelliTech\Yii2\Utils\ApiGeneratorController',
            'db' => 'db' // db comopnent id default: db
        ],
        'container' => [
            'class' => 'AtelliTech\Yii2\Utils\ContainerController',
            'defaultAction' => 'definitions',
            'sources' => [
                ['app\\components', '@app/components'],
                ['v1\\components', '@v1/components'],
            ]
        ],
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                '@app/migrations',
                '@yii/rbac/migrations'
            ],
        ],
      ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
    // configuration adjustments for 'dev' environment
    // requires version `2.1.21` of yii2-debug module
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
