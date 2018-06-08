<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-block',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'block\controllers',
    'bootstrap' => ['log'],
    'language'=> 'zh-CN',
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-block',
        ],
        'user' => [
//            'identityClass' => 'common\models\Adminuser',
            'identityClass' => 'common\models\SysUser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-block', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the block
            'name' => 'advanced-block',
        ],
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
