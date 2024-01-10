<?php
return [
    'baseUrl' => $params['baseUrl'],
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'rules' => [
        'GET /' => 'site/index',
        'GET apidoc' => 'v1/open-api-spec/index',
        ['class' => 'yii\rest\UrlRule',
         'controller' => [
            'users' => 'v1/users',
         ]
        ]
    ]
];