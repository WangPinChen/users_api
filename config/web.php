<?php

$params = require __DIR__ . '/params.php';
$urlManager = require __DIR__ . '/urlManager.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7u3s_LVtIQ-9ltxKXCg8oN4hMgGJDiIl',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'AtelliTech\Yii2\Utils\Log\JsonFileLogTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@runtime/logs/web.log',
                ],
            ],
        ],
        'postal' => [
            'class' => 'AtelliTech\Yii2\Postal',
            'host' => $params['postal']['host'],
            'key' => $params['postal']['host']
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
        ],
        'oldDb' => [
            'class' => 'yii\db\Connection',
            'dsn' => $params['oldDb']['dsn'],
            'username' => $params['oldDb']['username'],
            'password' => $params['oldDb']['password'],
            'charset' => 'utf8mb4',
        ],
        'urlManager' => $urlManager,
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
