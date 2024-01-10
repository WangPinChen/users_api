<?php

return [
    'baseUrl' => $_ENV['BASE_URL'] ?? '',
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD']
    ],
    'oldDb' => [
        'dsn' => $_ENV['DB_OLD_DSN'],
        'username' => $_ENV['DB_OLD_USERNAME'],
        'password' => $_ENV['DB_OLD_PASSWORD']
    ],
    'coreDb' => [
        'dsn' => $_ENV['DB_CORE_DSN'],
        'username' => $_ENV['DB_CORE_USERNAME'],
        'password' => $_ENV['DB_CORE_PASSWORD']
    ],
    'postal' => [
        'host' => $_ENV['POSTAL_HOST'],
        'key' => $_ENV['POSTAL_KEY'],
    ],
    'officeIP' => '202.39.237.53',
    'notificationEmails' => explode(',', $_ENV['NOTIFICATION_EMAILS']),
];