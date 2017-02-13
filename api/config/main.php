<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'modules' => [
        'v1' => [
            'basePath' => '@api/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ], 
    'components' => [ 
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
        ], 
        // 'user' => [
        //     'identityClass' => 'api\modules\v1\models\User',
        //     'enableAutoLogin' => false,
        // ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ], 
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => 'v1/goods'
                    
                ]
            ],        
        ], 
        'request' => [
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,  
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
                      
        ]
        // ,
        // 'response' => [
        //     'format' => yii\web\Response::FORMAT_JSON,
        //     'charset' => 'UTF-8',
        // ]   
        
    ],
    'params' => $params,
];
