<?php
return [
    // 'id' => 'app-backend',
    // 'basePath' => dirname(__DIR__),
    // 'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'controllerMap' => [
        // 'adminlteiframe' => [ // for adminlteiframe theme
        //     'class' => 'myzero1\adminlteiframe\controllers\SiteController'
        // ],
        // http://t1.test/moduarsite/demo/level21
        'demo' => [ // for the menu of demo
            'class' => 'myzero1\adminlteiframe\controllers\DemoController'
        ]
    ],
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
        'menu' => [
            [
                'id' => "平台首页",
                'text' => "平台首页2",
                'title'=>"平台首页",
                'icon' => "fa fa-dashboard",
                'targetType' => 'iframe-tab',
                'urlType' => 'abosulte',
                'url' => ['/moduarsite/site/index'],
                'isHome' => true,
            ],
            [
                'id' => "level1",
                'text' => "level1",
                'title'=>"level1",
                'icon' => "fa fa-dashboard",
                'targetType' => 'iframe-tab',
                'urlType' => 'abosulte',
                'url' => ['/moduarsite/default/level1'],
            ],
            [
                'id' => "level2",
                'text' => "level2",
                'title'=>"level2",
                'icon' => "fa fa-laptop",
                'url' => ['#'],
                'children' => [
                    [
                        'id' => "level21",
                        'text' => "level21",
                        'title'=>"level21",
                        'icon' => "fa fa-angle-double-right",
                        'targetType' => 'iframe-tab',
                        'urlType' => 'abosulte',
                        'url' => ['/moduarsite/default/level21'],
                    ],
                    [
                        'id' => "level22",
                        'text' => "level22",
                        'title'=>"level22",
                        'icon' => "fa fa-angle-double-right",
                        'targetType' => 'iframe-tab',
                        'urlType' => 'abosulte',
                        'url' => ['/moduarsite/default/level22'],
                    ],
                ],
            ],
        ],
    ],
];
