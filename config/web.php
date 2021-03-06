<?php

use yii\helpers\ArrayHelper;

require(__DIR__ . '/functions.php');

$params = ArrayHelper::merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$db = ArrayHelper::merge(
    require(__DIR__ . '/db.php'),
    require(__DIR__ . '/db-local.php')
);

$config = [
    'id' => 'HR',
    'name' => 'HR-портал МРФ "Центр" ПАО "Ростелеком"',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'app\modules\user\Bootstrap',
        'app\modules\admin\Bootstrap',
        'app\modules\main\Bootstrap',
        'app\modules\jk\Bootstrap',
        'app\modules\chat\Bootstrap',
        'app\modules\news\Bootstrap',
        'app\modules\pulsar\Bootstrap',
        'app\modules\nsi\Bootstrap',
        'app\modules\project\Bootstrap',
    ],
    'layout' => 'index',
    'language' => 'ru',
    'timeZone' => 'Europe/Moscow',
    'defaultRoute' => 'main/default/index',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@adminlte' => '@vendor/almasaeed2010/adminlte',
        '@files' => 'files',
    ],
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
        'jk' => [
            'class' => 'app\modules\jk\Module',
        ],
        'chat' => [
            'class' => 'app\modules\chat\Module',
        ],
        'news' => [
            'class' => 'app\modules\news\Module',
        ],
        'task' => ['class' => 'app\modules\task\Module'],
        'pulsar' => ['class' => 'app\modules\pulsar\Module'],
        'nsi' => ['class' => 'app\modules\nsi\Module'],
        'gridview' => ['class' => 'kartik\grid\Module'],
        'project' => ['class' => 'app\modules\project\Module'],
        'bot' => [
            'class' => 'app\modules\bot\Module',
        ],
    ],
    'components' => [
        'ad' => [
            'class' => 'Edvlerblog\Adldap2\Adldap2Wrapper',
            'providers' => [
                'default' => [
                    'autoconnect' => true,
                    'config' => [
                        'account_suffix' => $params['ad']['account_suffix'],
                        'hosts' => $params['ad']['hosts'],
                        'base_dn' => $params['ad']['base_dn'],
                        'username' => $params['ad']['username'],
                        'password' => $params['ad']['password'],
                        'port' => $params['ad']['port'],
                    ],
                ],
            ],
        ],



        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'm71YjtB7X51bk2lS2s7sHiedVrgUg2SN',
            'enableCsrfValidation'=>false,
        ],

        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d.m.Y',
            'datetimeFormat' => 'php:d.m.Y H:i:s',
            'timeFormat' => 'php:H:i:s',
            'thousandSeparator' => ' ',
            'decimalSeparator' => ',',
            'timeZone' => 'Europe/Moscow',
            'locale' => 'ru-RU',
            'nullDisplay' => '',

        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'linkAssets' => true,
        ],
        'user' => [
            'identityClass' => 'app\modules\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/default/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'main/default/error',
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => ['workshop@rt.ru' => 'WORKSHOP'],
            ],
            /*'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'xxx@gmail.com',
                'password' => 'xxx',
                'port' => '587',
                'encryption' => 'tls'
            ]*/
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
        'db' => $db,

        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true,
                    //'basePath' => '@app/messages',
                    'sourceLanguage' => 'ru-RU',
                    /*'fileMap' => [
                        'app' => 'app.php',
                        'app/jk' => 'app_jk.php',
                    ],*/
                ],
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'normalizeTrailingSlash' => true,
            ],


            'rules' => [

                '' => 'main/default/index',
                'team' => 'main/team/index',
                'about' => 'main/default/about',
                'contacts' => 'main/default/contacts',
                '<_a:error>' => 'main/default/<_a>',

                '<_m:(user)>/<id:\d+>' => 'user/default/view',
                '<_m:(news)>/<id:\d+>' => 'news/default/view',
                '<_a:(login|login2|logout|signup|confirm-email|request-password-reset|password-reset|users)>' => 'user/default/<_a>',

                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>' => '<_m>/default/index',

                '<_m:[\w\-]+>/<_a:(admin|table)>' => '<_m>/default/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',

            ],

        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.1.1', '::1','*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.1.1', '::1','*'],
    ];
}

return $config;