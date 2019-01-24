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
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            // 'forceCopy' => true,// true/false
            'bundles'=> [
                // 'myzero1\adminlteiframe\assets\php\components\LayoutAsset' => [
                //     'skin' => 'skin-red',// skin-{blue|black|purple|green|red|yellow}[-light],example skin-blue,skin-blue-light,
                //     'menuRefreshTab' => false, // true,false
                //     'jsVersion' => '1.7',
                //     'cssVersion' => '1.7',
                // ], // for adminlteiframe theme
                'myzero1\adminlteiframe\assets\php\components\AdminLteAsset' => [
                    'skin' => 'skin-red',// skin-{blue|black|purple|green|red|yellow}[-light],example skin-blue,skin-blue-light,
                    'jsVersion' => '1.7',
                    'cssVersion' => '1.7',
                ], // for adminlte theme
                'myzero1\adminlteiframe\assets\php\components\MainAsset' => [
                    'showJParticle' => 'false', // 'false'/'true', default 'true',required
                ], // for all theme
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
