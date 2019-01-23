<?php
return [
    // 'id' => 'app-backend',
    // 'basePath' => dirname(__DIR__),
    // 'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    // 'defaultRoute' => '/adminlteiframe/layout', // for adminlteiframe theme
    // 'controllerMap' => [
    //     'adminlteiframe' => [ // for adminlteiframe theme
    //         'class' => 'myzero1\adminlteiframe\controllers\SiteController'
    //     ],
    //     'demo' => [ // for the menu of demo
    //         'class' => 'myzero1\adminlteiframe\controllers\DemoController'
    //     ]
    // ],
    // 'layout' => 'main',// to set theme by setting layout and layoutPath
    // 'layoutPath' => \Yii::getAlias('@vendor/myzero1/yii2-theme-adminlteiframe/src/views/adminlte/layouts'),
    // 'layoutPath' => \Yii::getAlias('@vendor/myzero1/yii2-theme-adminlteiframe/src/views/adminlteiframe/layouts'),
    'modules' => [
        'z1site' => [
            'class' => 'backend\modules\z1site\Module',
        ],
        'moduarsite' => [
            'class' => '\myzero1\moduarsite\Module',
        ],
    ],
    'components' => [
        'view' => [
            'class' => 'yii\web\View',
            'theme' => [
                // 'class' => '\yii\base\Theme',
                'pathMap' => [
                    '@app/views' => '@vendor/myzero1/yii2-theme-adminlteiframe/src/views/adminlte', // using the adminlte theme
                    // '@app/views' => '@vendor/myzero1/yii2-theme-adminlteiframe/src/views/adminlteiframe', // using the adminlteiframe theme
                ],
            ],
        ],
    ],
    'params' => [
    ],
];
