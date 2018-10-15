<?php
return [
    // 'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
    	// 'z1log',
    ],
    'modules' => [
        // 'z1log' => [
        //     'class' => '\myzero1\log\Module',
        //     'params' => [
        //         'urlManager' => [
        //             'rules' => [
        //                 // 'rate/area/index' => 'rate/jf-core-area/index',
        //             ],
        //         ],
        //         'remarksFieldsKey' => [
        //             'remark', // default filed
        //             'r1', // custom field, can add it by yourself
        //         ],
        //         'userInfo' => [
        //             'id' => function(){
        //                 if(\Yii::$app->user->isGuest){
        //                     $id = 0;
        //                 } else {
        //                     $id = \Yii::$app->user->identity->id;
        //                 }

        //                 return $id;
        //             },
        //             'name' => function(){
        //                 if(\Yii::$app->user->isGuest){
        //                     $name = 'system';
        //                 } else {
        //                     $name = \Yii::$app->user->identity->username;
        //                 }
        //                 return $name;
        //             }
        //         ],
        //         'template' => [
        //             'user2/update' => [
        //                 'model' => 'all', // text,screenshot,all
        //                 'text' => function(){
        //                     return '修改用户'; 
        //                 },
        //                 'screenshot' => 'user2/update', // The template of screenshot
        //                 'obj' => [
        //                     'label' => '.field-user2-username .control-label',
        //                     'value' => '#user2-username',
        //                 ],
        //                 'remarks' => [// the items must be Closure
        //                     'remark' => function(){return 'default remark'.time();},
        //                     'r1' => function(){return 'r1'.time();},
        //                 ],
        //             ],
        //         ],
        //     ],
        // ],
        'modularsite' => [
            'class' => '\myzero1\moduarsite\Module',
        ],
        'test1' => [
            'class' => 'backend\modules\test\test1',
        ],
    ],
    'components' => [
        'urlManager' => [
        	'class' => '\yii\web\urlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            	'/modularsite/site/index' => '/modularsite/default/index',
            ],
        ],
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
    ]
];
