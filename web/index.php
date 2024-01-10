<?php

// comment out the following two lines when deployed to production

require __DIR__ . '/../vendor/autoload.php';

// add 
$repository = Dotenv\Repository\RepositoryBuilder::createWithNoAdapters()
    ->addAdapter(Dotenv\Repository\Adapter\EnvConstAdapter::class)
    ->addWriter(Dotenv\Repository\Adapter\PutenvAdapter::class)
    ->immutable()
    ->make();
// add 
$dotenv = Dotenv\Dotenv::create($repository, dirname(__DIR__));
$dotenv->safeLoad();

defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG') == 'true');
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV'));

require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();